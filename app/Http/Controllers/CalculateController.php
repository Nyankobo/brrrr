<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Future;
use App\Models\Income;
use App\Models\Property;
use App\Models\Purchase;
use App\Models\Refinance;
use App\Models\RentalInfo;
use App\Models\Report;
use Carbon\Carbon;

class CalculateController extends Controller
{
    /**
     * Sanitize and save form inputs
     * @return View
     * */
    public function index(Request $request)
    {
        // Create Property
        $propertyCols = Schema::getColumnListing('property');
        $property = Property::firstOrCreate($request->only($propertyCols));

        // Create unique Report
        $report = Report::create([
            'name' => $request->input('report_title'),
            'property_id' => $property->id,
            'created_at' => Carbon::now()
        ]);

        // Add Purchase Info
        $purchaseCols = Schema::getColumnListing('purchase');
        $purchase_inputs = $request->only($purchaseCols);
        $purchase_inputs['report_id'] = $report->id;
        if ($request->input('is_cash_purchase')) {
            $purchase_inputs['is_cash_purchase'] = $request->input('is_cash_purchase') == "on" ? 1 : 0;
        }
        if ($request->input('is_pmi_included')) {
            $purchase_inputs['is_pmi_included'] = $request->input('is_pmi_included') == "on" ? 1 : 0;
        }

        $purchase = Purchase::Create($purchase_inputs);

        // Add Rental Info
        $rentalCols = Schema::getColumnListing('rental_info');
        $rental_inputs = $request->only($rentalCols);
        $rental_inputs['report_id'] = $report->id;
        $rental = RentalInfo::create($rental_inputs);

        // Add Expenses Info
        $expensesCols = Schema::getColumnListing('expenses');
        $expenses_inputs = $request->only($expensesCols);
        $expenses_inputs['report_id'] = $report->id;
        $expenses = Expenses::create($expenses_inputs);

        // Add Refinance Info
        $refinanceCols = Schema::getColumnListing('refinance');
        $refinance_inputs = $request->only($refinanceCols);
        $refinance_inputs['report_id'] = $report->id;
        $refi = Refinance::create($refinance_inputs);

        // Add Income Info
        $incomeCols = Schema::getColumnListing('income');
        $income_inputs = $request->only($incomeCols);
        $income_inputs['report_id'] = $report->id;
        $income = Income::create($income_inputs);

        // Add Future Info
        $futureCols = Schema::getColumnListing('future');
        $future_inputs = $request->only($futureCols);
        $future_inputs['report_id'] = $report->id;
        $fut = Future::create($future_inputs);

        // Calculate purchase values
        $purchaseValues = $this->calculatePurchase(
            $report, 
            $request->input('downpayment_of_purchase_percent'),
            $request->input('closing_cost'),
            $request->input('estimated_repair_cost'),
        );

        // Gather fixed expenses
        $holdingCosts = $this->holdingCosts($report);
        $mortage = $this->mortgagePayment($report);

        return view("results")->with([
                'report' => $report, 
                'purchaseValues' => $purchaseValues, 
                'mortgage' => $mortage, 
                'holdingCosts' => $holdingCosts 
            ]);
    }

    /**
     * Display results
     * @param number $id
     * @return View
     * */
    public function results($id)
    {
        $report = Report::with(['purchase', 'refinance', 'rental', 'income', 'expenses', 'future'])->find($id);
                // Calculate purchase values
        $purchaseValues = 0;
        // $this->calculatePurchase(
        //     $report, 
        //     $request->input('downpayment_of_purchase_percent'),
        //     $request->input('closing_cost'),
        //     $request->input('estimated_repair_cost'),
        // );

        // Gather fixed expenses
        $holdingCosts = $this->holdingCosts($report);
        $mortage = $this->mortgagePayment($report);

        return view('results')->with([
                'report' => $report, 
                'purchaseValues' => $purchaseValues, 
                'mortgage' => $mortage, 
                'holdingCosts' => $holdingCosts 
            ]);
    }

    /**
     * Calculate purchase
     * @param Report $report
     * @param number $downpayment_percent, 
     * @param number $closing_cost
     * @param number $repairs
     * @return number - TOTAL CASH NEEDED AT PURCHASE	Downpayment + Closing Cost + Repairs
     */
    public function calculatePurchase($report, $downpayment_percent, $closing_cost, $repairs)
    {
        if (!$downpayment_percent || !$closing_cost || !$repairs) {
            return 0;
        }
        $percent = $downpayment_percent ? ($downpayment_percent * .01) : 0;
        $downpayment_of_purchase = $report->purchase->purchase_price ? ($report->purchase->purchase_price * $percent) : 0;
        $loan_amount = $report->purchase->purchase_price ? $report->purchase->purchase_price - $downpayment_of_purchase : 0;

        $total_payment = $this->mortgatePayment($report);

        $total_cash_at_purchase = $downpayment_of_purchase
            + $report->purchase->closing_cost
            + $report->purchase->estimated_repair_cost;

        return [
            'downpayment_of_purchase' => $downpayment_of_purchase,
            'loan_amount' => $loan_amount,
            'total_payment' => $total_payment,
            'total_cash_needed' => $total_cash_at_purchase
        ];
    }

    /**
     * Calculate the monthly mortgage payment, using purchase loan interest rate, amount, and amortized years
     * @param Report $report
     */
    public function mortgagePayment($report)
    {
        // M = P[r(1+r)^n/((1+r)^n)-1)]
            /*
            M = the total monthly mortgage payment.
            P = the principal loan amount.
            r = this->interestRate()
            n = number of payments over the loan’s lifetime. Multiply the number of years in your loan term by 12 
                (the number of months in a year) to get the number of payments for your loan. 
                For example, a 30-year fixed mortgage would have 360 payments (30x12=360)
            take the principal balance times the interest rate and divide by 12 months, which will give you the monthly interest
            */

        $calc = 0;
        $test = $report->purchase;
        $rate = $report->purchase->loan_interest_rate;
        if($rate) {
            $r = $this->interestRate($rate);
            $P = $report->purchase->loan_amount;
            $n = $report->purchase->amortized_years;

            $calc = $P * ( ($r * pow( 1 + $r , $n )) / ( pow( 1 + $r, $n ) - 1) );
        }

        return $calc;
    }

    /**
     * Calculate interest monthly interest rate
     * @param decimal $rate
     */
    public function interestRate($rate)
    {
        // r = your monthly interest rate. 
        // Lenders provide you an annual rate so you’ll need to divide that figure by 12 
        //      (the number of months in a year) to get the monthly rate. 
        //      If your interest rate is 5%, your monthly rate would be 0.004167 (0.05/12=0.004167)

        $pct = $rate * .01;
        return $pct / 12;
    }

    /**
     * Calculate holding costs based on fixed expenses, utilities, taxes & (purchase loan amount x interest rate)
     * @param Report $report
     */
    public function holdingCosts($report)
    {
        // INSURANCE + UTILITIES + TAXES + LOAN INTEREST
        // Loan amount * interestRate = loan Interest
        $lr = $report->purchase->loan_amount *  $this->interestRate($report->purchase->loan_interest_rate);
        return array_sum([
            $report->expenses->fixed_expenses_monthly_insurance,
            $report->expenses->fixed_expenses_electric_gas,
            $report->expenses->water_sewer,
            $report->expenses->garbage,
            $report->expenses->hoa,
            $report->expenses->property_taxes,
            $lr
        ]);
    }
}

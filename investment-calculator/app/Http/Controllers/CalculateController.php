<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Future;
use App\Models\Income;
use App\Models\Property;
use App\Models\PurchaseInfo;
use App\Models\Refinance;
use App\Models\RentalInfo;
use App\Models\Report;

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

        // Create Report
        $report = Report::create([
            'name' => $request->input('report_title'),
            'property_id' => $property->id
        ]);

        // Add Purchase Info
        $purchaseCols = Schema::getColumnListing('purchase');
        $purchaseCols['report_id'] = $report->id;
        $purchase = PurchaseInfo::Create($request->only($purchaseCols));
        $purchase->save();

        // Add Rental Info
        $rentalCols = Schema::getColumnListing('rental_info');
        $rentalCols['report_id'] = $report->id;
        $rental_inputs = $request->only($rentalCols);
        $rental_inputs['is_cash_purchase'] = !!$rental_inputs['is_cash_purchase'];
        $rental_inputs['is_pmi_included'] = !!$rental_inputs['is_pmi_included'];

        RentalInfo::create($rental_inputs);
        $rental->property_id = $property->id;
        $rental->save();

        // Add Expenses Info
        $expensesCols = Schema::getColumnListing('expenses');
        $expensesCols['report_id'] = $report->id;
        $expenses_inputs = $request->only($expensesCols);
        Expenses::create($expenses_inputs);

        // Add Refinance Info
        $refinanceCols = Schema::getColumnListing('refinance');
        $refinanceCols['report_id'] = $report->id;
        $refinance_inputs = $request->only($refinanceCols);
        Refinance::create($refinance_inputs);

        // Add Income Info
        $incomeCols = Schema::getColumnListing('income');
        $incomeCols['report_id'] = $report->id;
        $income_inputs = $request->only($incomeCols);
        Income::create($income_inputs);

        // Add Future Info
        $futureCols = Schema::getColumnListing('future');
        $futureCols['report_id'] = $report->id;
        $future_inputs = $request->only($futureCols);
        Future::create($future_inputs);

        // Calculate purchase values
        $purchaseValues = $this->calculatePurchase(
            $report, 
            $request->input('downpayment_of_purchase_percent')
        );

        // Gather fixed expenses
        $holdingCosts = [

        ];

        return view("results")->compact('report', 'purchaseValues', 'holdingCosts');
    }

    /**
     * Display results
     * @return View
     * */
    public function results($id)
    {
        $report = Report::find($id);
        return view('/results', ['report' => $report]);
    }

    public function calculatePurchase($report, $downpayment_percent, $closing_cost, $repairs)
    {
        $percent = $downpayment_percent * .01;
        $downpayment_of_purchase = $report->purchase->purchase_price * $percent;
        $loan_amount = $report->purchase->purchase_price - $downpayment_of_purchase;

        $total_payment = $this->mortgatePayment();

        $total_cash_at_purchase = $downpayment_of_purchase
            + $report->purchase->closing_cost
            + $report->purchase->estimated_repair_cost;

        return [
            'downpayment_of_purchase' => $downpayment_of_purchase,
            'loan_amount' => $loan_amount,
            'total_payment' => $total_payment,
            'total_cash_needed' => $total_cash_at_purchase
        ]
    }

    public function mortgagePayment()
    {
        // M = P[r(1+r)^n/((1+r)^n)-1)]
        /*
        M = the total monthly mortgage payment.
        P = the principal loan amount.
        r = this->interestRate()
        n = number of payments over the loan’s lifetime. Multiply the number of years in your loan term by 12 (the number of months in a year) to get the number of payments for your loan. For example, a 30-year fixed mortgage would have 360 payments (30x12=360)
        take the principal balance times the interest rate and divide by 12 months, which will give you the monthly interest
        */

        $monthlyRate = $this->interestRate($rate);
    }

    public function interestRate($rate)
    {
        // r = your monthly interest rate. 
        // Lenders provide you an annual rate so you’ll need to divide that figure by 12 
        //      (the number of months in a year) to get the monthly rate. 
        //      If your interest rate is 5%, your monthly rate would be 0.004167 (0.05/12=0.004167)

        $pct = $rate * .01;
        return $rate / 12;

    }
}

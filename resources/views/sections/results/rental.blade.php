
<div class="card">
    <div class="card-header">
      Acquisition: Purchase Loan Details
    </div>
    <div class="card-body">
        <div class="row">
            <div class="columns">
                @if($report->property->rental_info)
                <div class="column is-one-quarter">

                    <span>Cash Purchase:</span>
                     {{ $report->property->rental_info->is_cash_purchase }}
                    <br>
                    <span>Downpayment of purchase price (%):</span>
                    <!-- Enter as %, display as $$ of purchase price) -->
                    {{ $downpayment_of_purchase }}
                    <br>
                    <span>Loan interest rate:</span>
                    {{ $report->property->rental_info->loan_interest_rate }}
                    <br>
                    <span>PMI Included:</span>
                    {{ $report->property->rental_info->is_pmi_included }}
                    <br>
                    <span>Amortized Years:</span>
                    {{ $report->property->rental_info->amortized_years }}
                    <br>
                    <span>Refinance Months:</span>
                    {{ $report->property->rental_info->refinance_months }}
                    <br>
                    <span>Rehab Months:</span>
                    {{ $report->property->rental_info->rehab_months }}
                    <br>
                    <span>Refinance Loan Amount:</span>
                    {{ $report->property->rental_info->refinance_loan_amount }}
                    <br>
                    <span>Refinance Loan Interest Rate:</span>
                    {{ $report->property->rental_info->refinance_loan_interest_rate }}
                    <br>
                    <span>Refinance Amortized Years:</span>
                    {{ $report->property->rental_info->refinance_amortized_years }}
                    <br>
                    <span>Total Gross Monthly Rent:</span>
                    {{ $report->property->rental_info->income_total_gross_monthly_rent }}
                    <br>
                    <span>Other Monthly:</span>
                    {{ $report->property->rental_info->income_other_monthly }}
                    <br>
                    <span>Fixed Monthly Expenses:</span>
                    {{ $report->property->rental_info->fixed_expenses_monthly_insurance }}
                    <br>
                    <span>Fixed Expenses --<br>
                        <span>Electric, gas:</span>
                        {{ $report->property->rental_info->fixed_expenses_electric_gas }}
                        <br>
                        <span>Water, sewer:</span>
                        {{ $report->property->rental_info->fixed_expenses_water_sewer }}
                        <br>
                        <span>Garbage:</span>
                        {{ $report->property->rental_info->fixed_expenses_garbage }}
                        <br>
                        <span>HOA:</span>
                        {{ $report->property->rental_info->fixed_expenses_hoa }}
                        <br>
                        <span>Property Taxes:</span>
                        {{ $report->property->rental_info->fixed_expenses_property_taxes }}
                        <br>
                        <span>Other:</span>
                        {{ $report->property->rental_info->fixed_expenses_other }}
                        <br>
                    <span>Variable Expenses --<br>
                        <span>Vacancy:</span>
                        {{ $report->property->rental_info->variable_expenses_vacancy }}
                        <br>
                        <span>Repair & Maintenance:</span>
                        {{ $report->property->rental_info->variable_repair_maintenance }}
                        <br>
                        <span>Capital Expenditures:</span>
                        {{ $report->property->rental_info->variable_expenses_capital_expenditure }}
                        <br>
                        <span>Management Fees:</span>
                        {{ $report->property->rental_info->variable_expenses_mgmt_fees }}
                        <br>
                    <span>Future Annual Income Growth:</span>
                    {{ $report->property->rental_info->future_annual_income_growth }}
                    <br>
                    <span>Future Annual PV growth:</span>
                    {{ $report->property->rental_info->future_annual_pv_growth }}
                    <br>
                    <span>Future Annual Expense growth:</span>
                    {{ $report->property->rental_info->future_annual_expense_growth }}
                    <br>
                    <span>Future Sales Expenses:</span>
                    {{ $report->property->rental_info->future_sales_expenses }}
                </div>
                @endif
            </div>
        </div>
    </div>
  </div>
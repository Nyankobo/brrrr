
    @extends('layouts.app')
    
    @section('content')
    @php
        $report = isset($report) ? $report : null;
    @endphp

<div class="m-4">

    <form action="/save" method="POST" enctype="multipart/form-data" id="propertyForm">
        @csrf
        <!-- CONTAINER -->
        <div class="md:mt-0 md:col-span-2">
            <!-- shadow box -->
            <div class="overflow-hidden">
                <div class="m-2 shadow px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-1">
                            <label for="first_name" class="block text-3xl font-medium text-gray-700">Report Title</label>
                        </div>
                        <div class="col-span-3">
                            <input type="text" name="report_title" aria-describedby="reportTitle"
                            value="{{ old('report_title') ?: $report ? $report->name : '' }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>
            <!-- END shadow box -->

            <!-- shadow box -->
            <div class="m-2 shadow overflow-hidden sm:rounded-md">
                <!-- Parent box -->
                <div class="m-10 md:grid md:grid-cols-2 md:gap-6">

                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                        <h1 class="text-3xl">Property Info</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Address and taxes.
                        </p>
                        </div>
                    </div>

                    <div class="m-1 px-4 sm:px-0">
                        <select name="id" id="propertySelect" class="w-full block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">- Select an existing property:</option>
                            @foreach ($properties as $p)
                                <option value="{{$p->id}}">{{$p->getAddress()}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="address">Property Address</label>
                        <input type="text" class="text-form-custom" 
                            name="address"
                            aria-describedby="propertyAddress"
                            value={{ old('address') ?: $report ? $report->property->address : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="city">Property City</label>
                        <input type="text" class="text-form-custom" 
                            name="city"
                            aria-describedby="propertyCity"
                            value={{ old('city') ?: $report ? $report->property->city : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="state">Property State</label>
                        <input type="text" class="text-form-custom" 
                            name="state"
                            aria-describedby="propertyState"
                            value={{ old('state') ?: $report ? $report->property->state : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="zip">Property Zip</label>
                        <input type="text" class="text-form-custom" 
                            name="zip" 
                            aria-describedby="propertyZip"
                            value={{ old('zip') ?: $report ? $report->property->zip : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="annual-taxes">Annual Property Taxes</label>
                        <input type="text" class="text-form-custom"
                            name="annual_taxes"
                            aria-describedby="propertyAnnualTaxes"
                            value={{ old('annual_taxes') ?: $report ? $report->property->annual_taxes : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="mls">MLS #</label>
                        <input type="text" class="text-form-custom"
                            name="mls_no" 
                            aria-describedby="propertyMLS
                            value={{ old('propertyMLS') ?: $report ? $report->property->mls_no : '' }}">
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="photo">Property Photo</label>
                        <input type="file" class="text-form-custom"
                            name="photo"
                            aria-describedby="propertyPhoto"
                            value={{ old('photo') ?: $report ? $report->property->photo : null }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="description">Property Sales Description</label>
                        <textarea class="text-form-custom"
                            name="description"
                            aria-describedby="propertySalesDescription">{{ old('description') ?: $report ? $report->property->description : ''}}
                        </textarea>
                    </div>

                </div>
                <!-- end PARENT BOX -->
            </div>
            <!-- END shadow box -->

            <!-- shadow box -->
            <div class="m-2 shadow overflow-hidden sm:rounded-md">
                <div class="m-10 md:grid md:grid-cols-2 md:gap-6">
                    <div class="md:col-span-2">
                        <div class="px-4 sm:px-0">
                        <h1 class="text-3xl">Purchase Info</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Initial purchase data.
                        </p>
                        </div>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="purchase_price">Purchase Price</label>
                        <input type="text" class="text-form-custom" name="purchase_price"
                            aria-describedby="purchasePrice"
                            value={{ old('purchase_price') ?: $report ? $report->purchase->purchase_price : ''}}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="closing_cost">Purchase Closing Cost</label>
                        <input type="text" class="text-form-custom" name="closing_cost"
                            aria-describedby="purchaseClosingCost"
                            value={{ old('closing_cost') ?: $report ? $report->purchase->closing_cost : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="estimated_repair_cost">Estimated Repair Cost</label>
                        <input type="text" class="text-form-custom" name="estimated_repair_cost"
                            aria-describedby="purchaseEstimatedRepairCost"
                            value={{ old('estimated_repair_cost') ?: $report ? $report->rental->estimated_repair_cost : '' }}>
                    </div>

                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="arv">After Repair Value (ARV)</label>
                        <input type="text" class="text-form-custom" name="arv"
                            aria-describedby="purchaseAfterRepairValueARV"
                            value={{ old('arv') ?: $report ? $report->rental->arv : '' }}>
                    </div>
                </div>
            </div>
            <!-- END shadow box -->

            <!-- shadow box -->
            <div class="m-2 shadow overflow-hidden sm:rounded-md">
                <div class="m-10 mb-0 md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                        <h1 class="text-3xl">Rental Info</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Purchase Loan Details
                        </p>
                        </div>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="is_pmi_included">
                            <input type="checkbox" name="is_pmi_included"
                                aria-describedby="includePMI" 
                                @if(old('is_pmi_included') || ($report && $report->purchase->is_pmi_included) )
                                checked
                                @endif
                                />
                            Include PMI?</label>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="is_cash_purchase">
                            <input type="checkbox" name="is_cash_purchase"
                                aria-describedby="cashPurchase"
                                @if(old('is_cash_purchase') || ($report && $report->purchase->is_cash_purchase) )
                                checked
                                @endif
                                />
                            Cash Purchase</label>
                    </div>
                </div>

                <div class="m-10 md:grid md:grid-cols-2 md:gap-6">
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="downpayment_of_purchase">Downpayment of purchase price</label>
                        <input type="text" class="text-form-custom" name="downpayment_of_purchase"
                            aria-describedby="downpayemntOfPurchasePrice"
                            value={{ old('downpayment_of_purchase') ?: $report ? $report->purchase->downpayment_of_purchase : '' }}>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="loan_amount">Loan Amount</label>
                        <input type="text" class="text-form-custom" name="loan_amount"
                            aria-describedby="loanAmount"
                            value={{ old('loan_amount') ?: ''}}>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="loan_interest_rate">Loan interest rate</label>
                        <input type="text" class="text-form-custom" name="loan_interest_rate"
                            aria-describedby="loanInterestRate"
                            value={{ old('loan_interest_rate') ?: ''}}>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="refinance_months">Refinance after how many months</label>
                        <input type="text" class="text-form-custom" name="refinance_months"
                            aria-describedby="refinanceAfterHowManyMonths"
                            value={{ old('refinance_months') ?: ''}}>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="rehab_months">Estimated Rehab Time in Months</label>
                        <input type="text" class="text-form-custom" name="rehab_months"
                            aria-describedby="estimatedRehabTimeInMonths"
                            value={{ old('rehab_months') ?: ''}}>
                    </div>
                    <div class="m-1 text-right px-4 sm:px-0">
                        <label for="amortized_years">Amortized over how many years</label>
                        <input type="text" class="text-form-custom" name="amortized_years"
                            aria-describedby="amortizedOverHowManyYears"
                            value={{ old('amortized_years') ?: ''}}>
                    </div>

                </div>
            </div>
            <!-- END shadow box -->
        </div>
        <!-- end CONTAINER -->

</div>


            <div class="row">
                <div class="col">

                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        
                    </div>
                </div>
            </div>

            <br>

            <h1 class="text-3xl">Refinance Loan Details</h1>
            <h5>New loan</h5>

            <div class="container refinance-info-section">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_loan_amount">Enter Loan Amount</label>
                                <input type="text" class="text-form-custom" name="refinance_loan_amount"
                                    aria-describedby="newLoanAmount"
                                    value={{ old('refinance_loan_amount') ?: ''}}>
                            </div>

                            <div>
                                <label for="refinance_loan_interest_rate">Loan Interest rate</label>
                                <input type="text" class="text-form-custom" name="refinance_loan_interest_rate"
                                    aria-describedby="loanInterestRate"
                                    value={{ old('refinance_loan_interest_rate') ?: ''}}>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_amortized_years">Amortized over how many years</label>
                                <input type="text" class="text-form-custom" name="refinance_amortized_years"
                                    aria-describedby="amortizedOverHowManyYears"
                                    value={{ old('refinance_amortized_years') ?: ''}}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br><br>
        <div class="container income-section">

            <h1 class="text-3xl">Income</h1>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div>
                            <label for="income_total_gross_monthly_rent">Total Gross monthly rent</label>
                            <input type="text" class="text-form-custom" name="income_total_gross_monthly_rent"
                                aria-describedby="totalGrossMonthlyRent"
                                value={{ old('income_total_gross_monthly_rent') ?: ''}}>
                        </div>

                        <div>
                            <label for="income_other_monthly">Other monthly income</label>
                            <input type="text" class="text-form-custom" name="income_other_monthly"
                                aria-describedby="otherMonthlyIncome"
                                value={{ old('income_other_monthly') ?: ''}}>
                        </div>
                    </div>
                    <h5>Fixed Landlord paid expenses</h5>
                    <div class="form-group">
                        <div>
                            <label for="fixed_expenses_monthly_insurance">Monthly insurance</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_monthly_insurance"
                                aria-describedby="monthlyInsurance"
                                value={{ old('fixed_expenses_monthly_insurance') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_electric_gas">Electricity</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_electric_gas" 
                            aria-describedby="electricity"
                            value={{ old('fixed_expenses_electric_gas') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_water_sewer">Water &amp; Sewer</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_water_sewer"
                                aria-describedby="waterAndSewer"
                                value={{ old('fixed_expenses_water_sewer') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_garbage">Garbage</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_garbage" 
                            aria-describedby="garbage"
                            value={{ old('fixed_expenses_garbage') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_hoa">HOA</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_hoa" 
                            aria-describedby="hoa"
                            value={{ old('fixed_expenses_hoa') ?: ''}}>
                        </div>

                        <div>
                            <!-- COPIED FROM PREVIOUS INPUT -->
                            <label for="fixed_expenses_property_taxes">Property Taxes</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_property_taxes"
                                aria-describedby="propertyTaxes"
                                value={{ old('fixed_expenses_property_taxes') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_other">Other Monthly Expenses</label>
                            <input type="text" class="text-form-custom" name="fixed_expenses_other"
                                aria-describedby="otherMonthlyExpenses"
                                value={{ old('fixed_expenses_other') ?: ''}}>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h5>Variable Landlord paid expenses</h5>
                    <div class="form-group">
                        <div>
                            <label for="variable_expenses_vacancy">Vacancy (&percnt; of your income)</label>
                            <input type="text" class="text-form-custom" name="variable_expenses_vacancy" 
                            aria-describedby="vacancy"
                            value={{ old('variable_expenses_vacancy') ?: ''}}>
                        </div>
                        <div>
                            <label for="variable_expenses_repair_maintenance">Repairs &amp; Maintenance (&percnt;)</label>
                            <input type="text" class="text-form-custom" name="variable_expenses_repair_maintenance"
                                aria-describedby="repairsAndMaintenance"
                                value={{ old('variable_expenses_repair_maintenance') ?: ''}}>
                        </div>

                        <div>
                            <label for="variable_expenses_capital_expenditure">Capital Expenditure</label>
                            <input type="text" class="text-form-custom" name="variable_expenses_capital_expenditure"
                                aria-describedby="capitalExpenditure"
                                value={{ old('variable_expenses_capital_expenditure') ?: ''}}>
                        </div>
                        <div>
                            <label for="variable_expenses_mgmt_fees">Management Fees</label>
                            <input type="text" class="text-form-custom" name="variable_expenses_mgmt_fees" 
                            aria-describedby="managementFees"
                            value={{ old('variable_expenses_mgmt_fees') ?: ''}}>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container future-section">

            <h1 class="text-3xl">Future Assumptions</h1>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">

                        <div>
                            <label for="future_annual_income_growth">Annual Income Growth (&percnt;)</label>
                            <input type="text" class="text-form-custom" name="future_annual_income_growth"
                                aria-describedby="annualIncomeGrowth"
                                value={{ old('future_annual_income_growth') ?: ''}}>
                        </div>
                        <div>
                            <label for="future_annual_pv_growth">Annual PV Growth (&percnt;)</label>
                            <input type="text" class="text-form-custom" name="future_annual_pv_growth"
                                aria-describedby="annualPVGrowth"
                                value={{ old('future_annual_pv_growth') ?: ''}}>
                        </div>

                        <div>
                            <label for="future_annual_expense_growth">Annual Expense Growth (&percnt;)</label>
                            <input type="text" class="text-form-custom" name="future_annual_expense_growth"
                                aria-describedby="annualExpenseGrowth"
                                value={{ old('future_annual_expense_growth') ?: ''}}>
                        </div>
                        <div>
                            <label for="future_sales_expenses">Sales Expenses (&percnt;) Realtor Fees</label>
                            <input type="text" class="text-form-custom" name="future_sales_expenses"
                                aria-describedby="salesExpenses"
                                value={{ old('future_sales_expenses') ?: ''}}>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <button class="button is-large" type="submit">Submit</button>
    </form>
</div>
@push("scripts")
    <script>
        $(document).ready(function() {

            $('button#user-menu').on('click', function() {
                $('#drop-menu').toggle();
            })

            // Pre-populate property info:
            function populate(frm, data) {
                if (data) {
                    $.each(data, function(key, value){
                        $('[name='+key+']', frm).val(value);
                    });
                } else {
                    frm.find('input, textarea').each(function() {
                        $(this).val('');
                    });
                }
            }

            $('#propertySelect').on('change', function() {
                $frm = $('#propertyForm');

                if($(this).val()) {
                    var property = $(this).val();
                    var data = null;
                    $.get('/property/getdata/' + property, function(response) {
                        data = response;
                    }).done(function(reply) {
                        populate($frm, data)

                    }).fail(function(err) {
                        console.log(err);
                    });
                } else {
                    populate($frm, null);
                }
            })
        });
    </script>
@endpush
@endsection

    @extends('layouts.app')
    
    @section('content')
    @php
        $report = isset($report) ? $report : null;
    @endphp
<div class="">
    <form action="/save" method="POST" enctype="multipart/form-data" id="propertyForm">
        @csrf
        <div class="container report-title-section">
            <div class="row text-center">
                <div class="col-6 offset-md-3">
                    <div>
                        <label for="report_title">
                            <h2>Report Title</h2>
                        </label>
                        <input type="text" class="form-control" name="report_title" aria-describedby="reportTitle"
                        value={{ old('report_title') ?: $report ? $report->name : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container property-info-section">
            <div class="row">
                <div class="col-6">
                    <h2>Property Info</h2>
                    <div class="form-group mb-2">
                        <div class="select">
                            <select name="property" id="propertySelect">
                                <option value="">- Select an existing property:</option>
                                @foreach ($properties as $p)
                                    <option value="{{$p->id}}">{{$p->getAddress()}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="address">Property Address</label>
                            <input type="text" class="form-control" name="address"
                                aria-describedby="propertyAddress"
                                value={{ old('address') ?: $report ? $report->property->address : '' }}>
                        </div>

                        <div>
                            <label for="city">Property City</label>
                            <input type="text" class="form-control" name="city"
                                aria-describedby="propertyCity"
                                value={{ old('city') ?: $report ? $report->property->city : '' }}>
                        </div>

                        <div>
                            <label for="state">Property State</label>
                            <input type="text" class="form-control" name="state"
                                aria-describedby="propertyState"
                                value={{ old('state') ?: $report ? $report->property->state : '' }}>
                        </div>
                        <div>
                            <label for="zip">Property Zip</label>
                            <input type="text" class="form-control" name="zip" 
                                aria-describedby="propertyZip"
                                value={{ old('zip') ?: $report ? $report->property->zip : '' }}>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h2>&nbsp;</h2>
                    <div class="form-group mb-2">
                        <div>
                            <label for="annual-taxes">Annual Property Taxes</label>
                            <input type="text" class="form-control" name="annual_taxes"
                                aria-describedby="propertyAnnualTaxes"
                                value={{ old('annual_taxes') ?: $report ? $report->property->annual_taxes : '' }}>
                        </div>

                        <div>
                            <label for="mls">MLS #</label>
                            <input type="text" class="form-control" name="mls_no" aria-describedby="propertyMLS
                            value={{ old('propertyMLS') ?: $report ? $report->property->mls_no : '' }}">
                        </div>

                        <div>
                            <p>
                                <label for="photo">Property Photo</label>
                                <input type="file" class="form-control-file" name="photo"
                                    aria-describedby="propertyPhoto"
                                    value={{ old('photo') ?: $report ? $report->property->photo : null }}>
                            </p>
                        </div>
                        <div>
                            <label for="description">Property Sales Desccription</label>
                            <textarea class="form-control" name="description"
                                aria-describedby="propertySalesDescription">{{ old('description') ?: $report ? $report->property->description : ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container purchase-info-section">
            <div class="row">
                <div class="col-6">
                    <h2>Purchase Info</h2>
                    <div class="form-group">
                        <div>
                            <label for="purchase_price">Purchase Price</label>
                            <input type="text" class="form-control" name="purchase_price"
                                aria-describedby="purchasePrice"
                                value={{ old('purchase_price') ?: $report ? $report->purchase->purchase_price : ''}}>
                        </div>

                        <div>
                            <label for="closing_cost">Purchase Closing Cost</label>
                            <input type="text" class="form-control" name="closing_cost"
                                aria-describedby="purchaseClosingCost"
                                value={{ old('closing_cost') ?: $report ? $report->purchase->closing_cost : '' }}>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h2>&nbsp;</h2>
                    <div class="form-group">
                        <div>
                            <label for="estimated_repair_cost">Estimated Repair Cost</label>
                            <input type="text" class="form-control" name="estimated_repair_cost"
                                aria-describedby="purchaseEstimatedRepairCost"
                                value={{ old('estimated_repair_cost') ?: $report ? $report->rental->estimated_repair_cost : '' }}>
                        </div>
                        <div>
                            <label for="arv">After Repair Value (ARV)</label>
                            <input type="text" class="form-control" name="arv"
                                aria-describedby="purchaseAfterRepairValueARV"
                                value={{ old('arv') ?: $report ? $report->rental->arv : '' }}>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <h2>Rental Info</h2>
            <h5>Purchase Loan Details</h5>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_pmi_included"
                                    aria-describedby="includePMI" 
                                    @if(old('is_pmi_included') || ($report && $report->purchase->is_pmi_included) )
                                    checked
                                    @endif
                                    />
                                Include PMI?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_cash_purchase"
                                    aria-describedby="cashPurchase"
                                    @if(old('is_cash_purchase') || ($report && $report->purchase->is_cash_purchase) )
                                    checked
                                    @endif
                                    />
                                Cash Purchase</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div>
                            <label for="downpayment_of_purchase">Downpayment of purchase price</label>
                            <input type="text" class="form-control" name="downpayment_of_purchase"
                                aria-describedby="downpayemntOfPurchasePrice"
                                value={{ old('downpayment_of_purchase') ?: $report ? $report->purchase->downpayment_of_purchase : '' }}>
                        </div>
                        <div>
                            <label for="loan_amount">Loan Amount</label>
                            <input type="text" class="form-control" name="loan_amount"
                                aria-describedby="loanAmount"
                                value={{ old('loan_amount') ?: ''}}>
                        </div>
                        <div>
                            <label for="loan_interest_rate">Loan interest rate</label>
                            <input type="text" class="form-control" name="loan_interest_rate"
                                aria-describedby="loanInterestRate"
                                value={{ old('loan_interest_rate') ?: ''}}>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <div>
                            <label for="refinance_months">Refinance after how many months</label>
                            <input type="text" class="form-control" name="refinance_months"
                                aria-describedby="refinanceAfterHowManyMonths"
                                value={{ old('refinance_months') ?: ''}}>
                        </div>
                        <div>
                            <label for="rehab_months">Estimated Rehab Time in Months</label>
                            <input type="text" class="form-control" name="rehab_months"
                                aria-describedby="estimatedRehabTimeInMonths"
                                value={{ old('rehab_months') ?: ''}}>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="amortized_years">Amortized over how many years</label>
                                <input type="text" class="form-control" name="amortized_years"
                                    aria-describedby="amortizedOverHowManyYears"
                                    value={{ old('amortized_years') ?: ''}}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <h2>Refinance Loan Details</h2>
            <h5>New loan</h5>

            <div class="container refinance-info-section">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_loan_amount">Enter Loan Amount</label>
                                <input type="text" class="form-control" name="refinance_loan_amount"
                                    aria-describedby="newLoanAmount"
                                    value={{ old('refinance_loan_amount') ?: ''}}>
                            </div>

                            <div>
                                <label for="refinance_loan_interest_rate">Loan Interest rate</label>
                                <input type="text" class="form-control" name="refinance_loan_interest_rate"
                                    aria-describedby="loanInterestRate"
                                    value={{ old('refinance_loan_interest_rate') ?: ''}}>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_amortized_years">Amortized over how many years</label>
                                <input type="text" class="form-control" name="refinance_amortized_years"
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

            <h2>Income</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div>
                            <label for="income_total_gross_monthly_rent">Total Gross monthly rent</label>
                            <input type="text" class="form-control" name="income_total_gross_monthly_rent"
                                aria-describedby="totalGrossMonthlyRent"
                                value={{ old('income_total_gross_monthly_rent') ?: ''}}>
                        </div>

                        <div>
                            <label for="income_other_monthly">Other monthly income</label>
                            <input type="text" class="form-control" name="income_other_monthly"
                                aria-describedby="otherMonthlyIncome"
                                value={{ old('income_other_monthly') ?: ''}}>
                        </div>
                    </div>
                    <h5>Fixed Landlord paid expenses</h5>
                    <div class="form-group">
                        <div>
                            <label for="fixed_expenses_monthly_insurance">Monthly insurance</label>
                            <input type="text" class="form-control" name="fixed_expenses_monthly_insurance"
                                aria-describedby="monthlyInsurance"
                                value={{ old('fixed_expenses_monthly_insurance') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_electric_gas">Electricity</label>
                            <input type="text" class="form-control" name="fixed_expenses_electric_gas" 
                            aria-describedby="electricity"
                            value={{ old('fixed_expenses_electric_gas') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_water_sewer">Water &amp; Sewer</label>
                            <input type="text" class="form-control" name="fixed_expenses_water_sewer"
                                aria-describedby="waterAndSewer"
                                value={{ old('fixed_expenses_water_sewer') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_garbage">Garbage</label>
                            <input type="text" class="form-control" name="fixed_expenses_garbage" 
                            aria-describedby="garbage"
                            value={{ old('fixed_expenses_garbage') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_hoa">HOA</label>
                            <input type="text" class="form-control" name="fixed_expenses_hoa" 
                            aria-describedby="hoa"
                            value={{ old('fixed_expenses_hoa') ?: ''}}>
                        </div>

                        <div>
                            <!-- COPIED FROM PREVIOUS INPUT -->
                            <label for="fixed_expenses_property_taxes">Property Taxes</label>
                            <input type="text" class="form-control" name="fixed_expenses_property_taxes"
                                aria-describedby="propertyTaxes"
                                value={{ old('fixed_expenses_property_taxes') ?: ''}}>
                        </div>
                        <div>
                            <label for="fixed_expenses_other">Other Monthly Expenses</label>
                            <input type="text" class="form-control" name="fixed_expenses_other"
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
                            <input type="text" class="form-control" name="variable_expenses_vacancy" 
                            aria-describedby="vacancy"
                            value={{ old('variable_expenses_vacancy') ?: ''}}>
                        </div>
                        <div>
                            <label for="variable_expenses_repair_maintenance">Repairs &amp; Maintenance (&percnt;)</label>
                            <input type="text" class="form-control" name="variable_expenses_repair_maintenance"
                                aria-describedby="repairsAndMaintenance"
                                value={{ old('variable_expenses_repair_maintenance') ?: ''}}>
                        </div>

                        <div>
                            <label for="variable_expenses_capital_expenditure">Capital Expenditure</label>
                            <input type="text" class="form-control" name="variable_expenses_capital_expenditure"
                                aria-describedby="capitalExpenditure"
                                value={{ old('variable_expenses_capital_expenditure') ?: ''}}>
                        </div>
                        <div>
                            <label for="variable_expenses_mgmt_fees">Management Fees</label>
                            <input type="text" class="form-control" name="variable_expenses_mgmt_fees" 
                            aria-describedby="managementFees"
                            value={{ old('variable_expenses_mgmt_fees') ?: ''}}>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container future-section">

            <h2>Future Assumptions</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">

                        <div>
                            <label for="future_annual_income_growth">Annual Income Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_income_growth"
                                aria-describedby="annualIncomeGrowth"
                                value={{ old('future_annual_income_growth') ?: ''}}>
                        </div>
                        <div>
                            <label for="future_annual_pv_growth">Annual PV Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_pv_growth"
                                aria-describedby="annualPVGrowth"
                                value={{ old('future_annual_pv_growth') ?: ''}}>
                        </div>

                        <div>
                            <label for="future_annual_expense_growth">Annual Expense Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_expense_growth"
                                aria-describedby="annualExpenseGrowth"
                                value={{ old('future_annual_expense_growth') ?: ''}}>
                        </div>
                        <div>
                            <label for="future_sales_expenses">Sales Expenses (&percnt;) Realtor Fees</label>
                            <input type="text" class="form-control" name="future_sales_expenses"
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
@section('script')
<script>
    $(document).ready(function() {

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
@show
@endsection
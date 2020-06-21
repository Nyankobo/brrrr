
    @extends('layouts.app')
    
    @section('content')

    <form action="/save" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid report-title-section">
            <div class="row text-center">
                <div class="col-6 offset-md-3">
                    <div>
                        <label for="report_title">
                            <h2>Report Title</h2>
                        </label>
                        <input type="text" class="form-control" name="report_title" aria-describedby="reportTitle">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid property-info-section">
            <div class="row">
                <div class="col-6">
                    <h2>Property Info</h2>
                    <div class="form-group mb-2">
                        <div>
                            <label for="address">Property Address</label>
                            <input type="text" class="form-control" name="address"
                                aria-describedby="propertyAddress">
                        </div>

                        <div>
                            <label for="city">Property City</label>
                            <input type="text" class="form-control" name="city"
                                aria-describedby="propertyCity">
                        </div>

                        <div>
                            <label for="state">Property State</label>
                            <input type="text" class="form-control" name="state"
                                aria-describedby="propertyState">
                        </div>
                        <div>
                            <label for="zip">Property Zip</label>
                            <input type="text" class="form-control" name="zip" 
                                aria-describedby="propertyZip">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h2>&nbsp;</h2>
                    <div class="form-group mb-2">
                        <div>
                            <label for="annual-taxes">Annual Property Taxes</label>
                            <input type="text" class="form-control" name="annual_taxes"
                                aria-describedby="propertyAnnualTaxes">
                        </div>

                        <div>
                            <label for="mls">MLS #</label>
                            <input type="text" class="form-control" name="mls_no" aria-describedby="propertyMLS">
                        </div>

                        <div>
                            <p>
                                <label for="photo">Property Photo</label>
                                <input type="file" class="form-control-file" name="photo"
                                    aria-describedby="propertyPhoto">
                            </p>
                        </div>
                        <div>
                            <label for="description">Property Sales Desccription</label>
                            <textarea class="form-control" name="description"
                                aria-describedby="propertySalesDescription"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid purchase-info-section">
            <div class="row">
                <div class="col-6">
                    <h2>Purchase Info</h2>
                    <div class="form-group">
                        <div>
                            <label for="purchase_price">Purchase Price</label>
                            <input type="text" class="form-control" name="purchase_price"
                                aria-describedby="purchasePrice">
                        </div>

                        <div>
                            <label for="closing_cost">Purchase Closing Cost</label>
                            <input type="text" class="form-control" name="closing_cost"
                                aria-describedby="purchaseClosingCost">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h2>&nbsp;</h2>
                    <div class="form-group">
                        <div>
                            <label for="estimated_repair_cost">Estimated Repair Cost</label>
                            <input type="text" class="form-control" name="estimated_repair_cost"
                                aria-describedby="purchaseEstimatedRepairCost">
                        </div>
                        <div>
                            <label for="arv">After Repair Value (ARV)</label>
                            <input type="text" class="form-control" name="arv"
                                aria-describedby="purchaseAfterRepairValueARV">
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
                                    aria-describedby="includePMI" />
                                Include PMI?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_cash_purchase"
                                    aria-describedby="cashPurchase" />
                                Cash Purchase</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <div>
                            <label for="downpayment_of_purchase_percent">Downpayment of purchase price</label>
                            <input type="text" class="form-control" name="downpayment_of_purchase"
                                aria-describedby="downpayemntOfPurchasePrice">
                        </div>
                        <div>
                            <label for="loan_interest_rate">Loan interest rate</label>
                            <input type="text" class="form-control" name="loan_interest_rate"
                                aria-describedby="loanInterestRate">
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <div>
                            <label for="refinance_months">Refinance after how many months</label>
                            <input type="text" class="form-control" name="refinance_months"
                                aria-describedby="refinanceAfterHowManyMonths">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <div>
                            <label for="rehab_months">Estimated Rehab Time in Months</label>
                            <input type="text" class="form-control" name="rehab_months"
                                aria-describedby="estimatedRehabTimeInMonths">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="amortized_years">Amortized over how many years</label>
                                <input type="text" class="form-control" name="amortized_years"
                                    aria-describedby="amortizedOverHowManyYears">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <h2>Refinance Loan Details</h2>
            <h5>New loan</h5>

            <div class="container-fluid refinance-info-section">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_loan_amount">Enter Loan Amount</label>
                                <input type="text" class="form-control" name="refinance_loan_amount"
                                    aria-describedby="newLoanAmount">
                            </div>

                            <div>
                                <label for="refinance_loan_interest_rate">Loan Interest rate</label>
                                <input type="text" class="form-control" name="refinance_loan_interest_rate"
                                    aria-describedby="loanInterestRate">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div>
                                <label for="refinance_amortized_years">Amortized over how many years</label>
                                <input type="text" class="form-control" name="refinance_amortized_years"
                                    aria-describedby="amortizedOverHowManyYears">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br><br>
        <div class="container-fluid income-section">

            <h2>Income</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div>
                            <label for="income_total_gross_monthly_rent">Total Gross monthly rent</label>
                            <input type="text" class="form-control" name="income_total_gross_monthly_rent"
                                aria-describedby="totalGrossMonthlyRent">
                        </div>

                        <div>
                            <label for="income_other_monthly">Other monthly income</label>
                            <input type="text" class="form-control" name="income_other_monthly"
                                aria-describedby="otherMonthlyIncome">
                        </div>
                    </div>
                    <h5>Fixed Landlord paid expenses</h5>
                    <div class="form-group">
                        <div>
                            <label for="fixed_expenses_monthly_insurance">Monthly insurance</label>
                            <input type="text" class="form-control" name="fixed_expenses_monthly_insurance"
                                aria-describedby="monthlyInsurance">
                        </div>
                        <div>
                            <label for="fixed_expenses_electric_gas">Electricity</label>
                            <input type="text" class="form-control" name="fixed_expenses_electric_gas" aria-describedby="electricity">
                        </div>
                        <div>
                            <label for="fixed_expenses_water_sewer">Water &amp; Sewer</label>
                            <input type="text" class="form-control" name="fixed_expenses_water_sewer"
                                aria-describedby="waterAndSewer">
                        </div>
                        <div>
                            <label for="fixed_expenses_garbage">Garbage</label>
                            <input type="text" class="form-control" name="fixed_expenses_garbage" aria-describedby="garbage">
                        </div>
                        <div>
                            <label for="fixed_expenses_hoa">HOA</label>
                            <input type="text" class="form-control" name="fixed_expenses_hoa" aria-describedby="hoa">
                        </div>

                        <div>
                            <!-- COPIED FROM PREVIOUS INPUT -->
                            <label for="fixed_expenses_property_taxes">Property Taxes</label>
                            <input type="text" class="form-control" name="fixed_expenses_property_taxes"
                                aria-describedby="propertyTaxes">
                        </div>
                        <div>
                            <label for="fixed_expenses_other">Other Monthly Expenses</label>
                            <input type="text" class="form-control" name="fixed_expenses_other"
                                aria-describedby="otherMonthlyExpenses">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h5>Variable Landlord paid expenses</h5>
                    <div class="form-group">
                        <div>
                            <label for="variable_expenses_vacancy">Vacancy (&percnt; of your income)</label>
                            <input type="text" class="form-control" name="variable_expenses_vacancy" aria-describedby="vacancy">
                        </div>
                        <div>
                            <label for="variable_expenses_repair_maintenance">Repairs &amp; Maintenance (&percnt;)</label>
                            <input type="text" class="form-control" name="variable_expenses_repair_maintenance"
                                aria-describedby="repairsAndMaintenance">
                        </div>

                        <div>
                            <label for="variable_expenses_capital_expenditure">Capital Expenditure</label>
                            <input type="text" class="form-control" name="variable_expenses_capital_expenditure"
                                aria-describedby="capitalExpenditure">
                        </div>
                        <div>
                            <label for="variable_expenses_mgmt_fees">Management Fees</label>
                            <input type="text" class="form-control" name="variable_expenses_mgmt_fees" aria-describedby="managementFees">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container-fluid future-section">

            <h2>Future Assumptions</h2>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">

                        <div>
                            <label for="future_annual_income_growth">Annual Income Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_income_growth"
                                aria-describedby="annualIncomeGrowth">
                        </div>
                        <div>
                            <label for="future_annual_pv_growth">Annual PV Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_pv_growth"
                                aria-describedby="annualPVGrowth">
                        </div>

                        <div>
                            <label for="future_annual_expense_growth">Annual Expense Growth (&percnt;)</label>
                            <input type="text" class="form-control" name="future_annual_expense_growth"
                                aria-describedby="annualExpenseGrowth">
                        </div>
                        <div>
                            <label for="future_sales_expenses">Sales Expenses (&percnt;) Realtor Fees</label>
                            <input type="text" class="form-control" name="future_sales_expenses"
                                aria-describedby="salesExpenses">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <button class="button is-large" type="submit">Submit</button>
    </form>
@endsection
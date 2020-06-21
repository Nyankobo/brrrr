
<div class="card">
    <div class="card-header">
      Purchase Info
      <span>Purchase Price: {{ $report->property->purchase->purchase_price }}</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="columns">
                <div class="column is-one-quarter">
                    <span>Purchase Closing Costs:</span>
                    {{ $report->property->purchase->closing_cost }}<br>
                    <span>Estimated Repairs:</span>
                    {{ $report->property->purchase->estimated_repair_cost }}<br>
                    <span>Total Project Cost:</span>
                    {{ array_sum(
                        [
                            $report->property->purchase->closing_cost,
                            $report->property->purchase->estimated_repair_cost,
                            $report->property->purchase->purchase_price
                        ])
                    )}}
                    <br>
                    <span>After Repair Value:</span> 
                    {{ $report->property->purchase->arv }}
                </div>
            </div>
        </div>
    </div>
  </div>

<div class="card">
    <div class="card-header">
      Purchase Info
      <span>Purchase Price: {{ $report->purchase ? $report->purchase->purchase_price : 'no purchase' }}</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="columns">
                @if($report->purchase)
                <div class="column is-one-quarter">
                    <span>Purchase Closing Costs:</span>
                    {{ $report->purchase->closing_cost }}<br>
                    <span>Estimated Repairs:</span>
                    {{ $report->purchase->estimated_repair_cost }}<br>
                    <span>Total Project Cost:</span>
                    {{ array_sum(
                        [
                            $report->purchase->closing_cost,
                            $report->purchase->estimated_repair_cost,
                            $report->purchase->purchase_price
                        ])
                    }}
                    <br>
                    <span>After Repair Value:</span> 
                    {{ $report->purchase->arv }}
                </div>
                @endif
            </div>
        </div>
    </div>
  </div>
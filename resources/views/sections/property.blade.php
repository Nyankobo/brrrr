
<div class="card">
    <div class="card-header">
      Report: {{ $report->name }}
    </div>
    <div class="card-body">
        @if(isset($report->property->photo))
            <p>
                <img src="data:image/png;base64,{{ chunk_split(base64_encode($report->property->photo)) }}"
                 title="{{ $report->property->address }}"></p>
        @endif
            <p>
                Address:<br>
                {{ $report->property->address }}<br>
             {{ $report->property->city}}, {{ $report->property->state }}  {{ $report->property->zip }}</p>
        <p>
            {{ $report->property->description }}
        </p>
        <div class="row">
            <div class="columns">
                <div class="column is-one-quarter">
                    Annual Taxes: {{ $report->property->annual_taxes }}
                </div>
                <div class="column is-one-quarter">
                    MLS #: {{ $report->property->mls_no }}
                </div>
            </div>
        </div>
    </div>
  </div>
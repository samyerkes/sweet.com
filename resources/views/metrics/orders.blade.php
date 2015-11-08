@extends('base')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.css" />
	<style>
	.ct-series-a .ct-line {
	  stroke: #16a085;
	}
	.ct-series-a .ct-point {
	  stroke: #16a085;
	}
	.ct-series-b .ct-line {
	  stroke: #9b59b6;
	}
	.ct-series-b .ct-point {
	  stroke: #9b59b6;
	}
	</style>
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Transaction totals per day</div>
		<div class="ct-chart ct-major-tenth"></div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p class="text-muted"><span style="color: #16a085;">Green</span> = transaction amount per day in dollars<br /> <span style="color: #9b59b6;">Purple</span> = the amount of orders made</p>
		</div>
		<div class="col-md-6">
			<a href="#" onclick="window.print();" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print report</a>
		</div>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.js"></script>
	<script>
		var data = {
			// A labels array that can contain any sort of values
			labels: [
				@foreach($measure as $m)
					'{{ $m->dateOrdered }}',
				@endforeach
			],
			// Our series array that contains series objects or in this case series data arrays
			series: [
				[
					@foreach($measure as $m)
						'{{ $m->dayTotal }}',
					@endforeach
				], [
					@foreach($measure as $m)
						'{{ $m->numberTransaction }}',
					@endforeach
				]
			]
		};
		var options = {
		  width: 300,
		  height: 200
		};
		// Create a new line chart object where as first parameter we pass in a selector
		// that is resolving to our chart container element. The Second parameter
		// is the actual data object.
		new Chartist.Line('.ct-chart', data);
	</script>
@endsection
@extends('base')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.css" />
	<style>
	/*.ct-series-a .ct-line {
	  stroke: #16a085;
	}
	.ct-series-a .ct-point {
	  stroke: #16a085;
	}*/
	.ct-series-a .ct-area{
		fill: orange;
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
		<div class="panel-heading">Transaction totals per day in dollars</div>
		<div class="ct-chart ct-major-tenth" id="chart1"></div>
	</div>
	

	<div class="panel panel-default">
		<div class="panel-heading">Order totals per day</div>
		<div class="ct-chart ct-major-tenth" id="chart2"></div>
	</div>

	<a href="#" onclick="window.print();" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print report</a>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.js"></script>
	<script>
		new Chartist.Line('#chart1', {
	    labels: [
				@foreach($measure as $m)
					'{{ $m->dateOrdered }}',
				@endforeach
			],
	    series: [[
					@foreach($measure as $m)
						'{{ $m->dayTotal }}',
					@endforeach
				]]
		}, {
			low: 0,
			showArea: true,
			lineSmooth: false,
		});

		new Chartist.Line('#chart2', {
	    labels: [
				@foreach($measure as $m)
					'{{ $m->dateOrdered }}',
				@endforeach
			],
	    series: [[
					@foreach($measure as $m)
						'{{ $m->numberTransaction }}',
					@endforeach
				]]
		}, {
			low: 0,
			showArea: true,
			lineSmooth: false,
		});

		// var data = {
		// 	// A labels array that can contain any sort of values
		// 	labels: [
		// 		@foreach($measure as $m)
		// 			'{{ $m->dateOrdered }}',
		// 		@endforeach
		// 	],
		// 	// Our series array that contains series objects or in this case series data arrays
		// 	series: [
		// 		[
		// 			@foreach($measure as $m)
		// 				'{{ $m->dayTotal }}',
		// 			@endforeach
		// 		], [
		// 			@foreach($measure as $m)
		// 				'{{ $m->numberTransaction }}',
		// 			@endforeach
		// 		]
		// 	]
		// };
		// var options = {
		//   width: 300,
		//   height: 200
		// };
		// // Create a new line chart object where as first parameter we pass in a selector
		// // that is resolving to our chart container element. The Second parameter
		// // is the actual data object.
		// new Chartist.Line('.ct-chart', data);
	</script>
@endsection
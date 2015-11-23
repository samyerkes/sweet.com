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
	.ct-label {
		font-size: 14px !important;
	}
	</style>
@endsection

@section('content')

	{!! Breadcrumbs::render('admin.metrics.supply') !!}

	<div class="panel panel-default">
		<div class="panel-heading">Ingredient inventory</div>
		<div class="ct-chart ct-major-tenth"></div>
	</div>
	
	<a href="#" onclick="window.print();" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print report</a>	

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
					'{{ $m->name }}',
				@endforeach
			],
			// Our series array that contains series objects or in this case series data arrays
			series: [
				[
					@foreach($measure as $m)
						'{{ $m->quantity }}',
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
		new Chartist.Bar('.ct-chart', data);
	</script>
@endsection
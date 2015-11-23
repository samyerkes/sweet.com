@extends('base')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.css" />
	<style>
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
	
	{!! Breadcrumbs::render('admin.metrics.users') !!}

	<div class="panel panel-default">
		<div class="panel-heading">User report</div>
		<div class="ct-chart ct-major-tenth" id="chart1"></div>
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
					'{{ $m->created_at }}',
				@endforeach
			],
	    series: [[
					@foreach($measure as $m)
						'{{ $m->userCount }}',
					@endforeach
				]]
		}, {
			low: 0,
			showArea: true,
			lineSmooth: false,
		});
	</script>
@endsection
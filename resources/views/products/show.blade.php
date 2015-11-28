@extends('base')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.css" />
@endsection

@section('content')

	{!! Breadcrumbs::render('admin.products.show', $product) !!}

	@if ($product->inventory < 10)
		<div class="panel panel-warning">
	@else
		<div class="panel panel-success">
	@endif
		<div class="panel-heading">
			{{ $product->name }}
			<a href="{{ route('admin.products.edit', array('id' => $product->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit </a>
		</div>
		<div class="panel-body">
			<strong>Price:</strong> ${{ $product->price }} per unit<br />
			<p>{!! $product->description !!}</p>
			<p><a href="{{ route('admin.recipe.show', array('id' => $product->id)) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit recipe</a></p>
	    </div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Sales metrics
		</div>
		<div class="panel-body">
			<div class="ct-chart ct-major-tenth"></div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Orders this week containing {{ $product->name }}
		</div>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Customer</th>
				<th>Date Ordered</th>
				<th>Status</th>
			</thead>
			@foreach ($orders as $order)
				<tr>
					<td><a href="{{ route('admin.orders.show', array('id' => $order->id)) }}">{{ $order->id }}</a></td>
					<td>{{ $order->user->fname }} {{ $order->user->lname }}</td>
					<td>{{ $order->created_at->format('F dS, Y') }}</td>
					<td>
						@if ( $order->status_id == 1)
							<span class="glyphicon glyphicon-shopping-cart"></span>
						@elseif ( $order->status_id == 2)
							<span class="glyphicon glyphicon-arrow-right"></span>
						@else
							<span class="glyphicon glyphicon-ok"></span>
						@endif
					</td>
				</tr>
			@endforeach
		</table>
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
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
			// Our series array that contains series objects or in this case series data arrays
			series: [[5, 7, 5, 8, 5]]
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

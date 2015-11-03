@extends('base')

@section('content')
	@if ($product->inventory < 10)
		<div class="panel panel-warning">
	@else
		<div class="panel panel-success">
	@endif
		<div class="panel-heading">
			{{ $product->name }} <a href="{{ route('admin.products.edit', array('id' => $product->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
		</div>
		<div class="panel-body">
			<strong>Price:</strong> ${{ $product->price }} per unit<br />
			<p>{!! $product->description !!}</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			Sales of {{ $product->name }} this week
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
					<td>{{ $order->dateOrdered }}</td>
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
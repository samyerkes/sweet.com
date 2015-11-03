@extends('base')

@section('content')

	@if ($order->status->id == 2)
		<div class="panel panel-warning">
	@elseif ($order->status->id == 3)
		<div class="panel panel-success">
	@else 
		<div class="panel panel-default">
	@endif
		<div class="panel-heading">
			Order #{{ $order->id }}
		</div>
		<div class="panel-body">
			<strong>Name:</strong>
			@if ($currentUser->role->id == 1)
				<a href="{{ route('admin.users.show', array('id' => $order->user->id)) }}">{{ $order->user->fname }} {{ $order->user->lname }}</a><br />
			@else
				{{ $order->user->fname }} {{ $order->user->lname }}<br />
			@endif
			<strong>Address:</strong> {{ $order->address }}<br />
			<strong>Payment number:</strong> {{ $order->payment }}<br />
			<strong>Order Date:</strong> {{ $order->dateOrdered }}<br />
	    </div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Order items <span class="pull-right badge">{{ $items->count() }}</span>
		</div>
		<table class="table">
			<thead>
				<th>Item</th>
				<th>Price per unit</th>
				<th>Quantity</th>
				<th>Line total</th>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td><a href="{{ route('product.item', array('id' => $item->id)) }}">{{ $item->name }}</a></td>
						<td>${{ $item->price }}</td>
						<td>{{ $item->pivot->quantity }}</td>
						<td>${{ number_format($item->pivot->quantity * $item->price, 2) }}</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<th>Total</th>
				<th></th>
				<th></th>
				<th>${{ number_format($sum, 2) }}</th>
			</tfoot>
		</table>
	</div>

	@if ($order->status->id == 2)
		<a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Mark order as completed</a>
	@endif
	
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
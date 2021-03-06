@extends('base')

@section('content')

	{!! Breadcrumbs::render('profile.show', $currentUser, $order) !!}

	@if ($order->status->id == 2)
		<div class="progress">
			<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			<span class="sr-only">40% In Progress</span>
			</div>
		</div>
	@elseif ($order->status->id == 3)
		<div class="progress">
			<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			<span class="sr-only">100% Complete</span>
			</div>
		</div>
	@endif


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
			<strong>Address:</strong> {{ $order->address }}<br />
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

	@if($order->status_id == 1)
		<a class="btn btn-primary btn-lg">Checkout</a>
	@endif

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection

@extends('base')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			All completed orders <span class="pull-right badge">{{ $orders->count() }}</span>
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
							<span class="glyphicon glyphicon-remove"></span>
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
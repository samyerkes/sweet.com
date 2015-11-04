@extends('base')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			All pending orders <span class="pull-right badge">{{ $porders->count() }}</span>
		</div>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Customer</th>
				<th>Date Ordered</th>
				<th>Status</th>
			</thead>
			@foreach ($porders as $porder)
				<tr>
					<td><a href="{{ route('admin.orders.show', array('id' => $porder->id)) }}">{{ $porder->id }}</a></td>
					<td>{{ $porder->user->fname }} {{ $porder->user->lname }}</td>
					<td>{{ $porder->dateOrdered }}</td>
					<td>
						@if ( $porder->status_id == 1)
							<span class="glyphicon glyphicon-shopping-cart"></span>
						@elseif ( $porder->status_id == 2)
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
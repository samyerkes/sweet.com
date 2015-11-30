@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.activity') !!}

	<div class="panel panel-default">
		<div class="panel-heading">Activity log</div>
		<table class="table table-striped">
			<thead>
				<th>User</th>
				<th>Action</th>
				<th>IP Address</th>
				<th>Date</th>
			</thead>
			<tbody>
				@foreach($latestActivities as $activity)
				<tr>
					<td>{{ $activity->user->fname}} {{ $activity->user->lname}}</td>
					<td>{{ $activity->text}}</td>
					<td>{{ $activity->ip_address}}</td>
					<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->created_at)->diffForHumans() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<a href="#" onclick="window.print();" class="btn btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print report</a>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

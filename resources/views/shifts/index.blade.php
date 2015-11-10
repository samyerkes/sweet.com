@extends('base')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Employees on shift today<a href="{{ route('admin.products.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th>Role</th>
				<th>Start time</th>
				<th>End time</th>
			</thead>
			@foreach ($users as $u)
				<tr>
					<td><a href="{{ route('admin.users.show', array('id' => $u->id)) }}">{{ $u->fname }} {{ $u->lname }}</td>
					<td>{{ $u->role->role }}</td>
					<td>{{ $u->pivot->start_time }}</td>
					<td>{{ $u->pivot->end_time }}</td>
				</tr>
			@endforeach
		</table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
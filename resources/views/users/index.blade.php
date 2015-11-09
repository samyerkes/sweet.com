@extends('base')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">All users</div>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Role</th>
			</thead>
			@foreach ($users as $u)
				<tr>
					<td><a href="{{ route('admin.users.show', array('id' => $u->id)) }}">{{ $u->id }}</a></td>
					<td>{{ $u->fname }} {{ $u->lname }}</td>
					<td>{{ $u->role->role }}</td>
				</tr>
			@endforeach
		</table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
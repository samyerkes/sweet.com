@extends('base')

@section('content')
	@foreach($shift as $s)
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>{{ date('l, F d, Y', strtotime($s->date)) }}</strong> 
			@if ($currentUser->role->id == 1)
				<a href="schedule/create/{{ $s->id }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add employee</a>
			@endif
		</div>
		<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th class="hidden-xs">Role</th>
				<th>Start time</th>
				<th>End time</th>
				@if ($currentUser->role->id == 1)
					<th class="hidden-xs"></th>
				@endif
			</thead>
				@foreach($s->users as $u)
					<tr>
						<td>{{ $u->fname}} {{ $u->lname }}</td>
						<td class="hidden-xs">{{ $u->role->role }}</td>
						<td>{{ date('g:i a', strtotime($u->pivot->start_time)) }}</td>
						<td>{{ date('g:i a', strtotime($u->pivot->end_time)) }}</td>
						@if ($currentUser->role->id == 1)
							<td class="hidden-xs">
								{!! Form::open(['route' => ['admin.schedule.destroy', $u->pivot->id], 'method' => 'delete']) !!}
		                            {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right btn-xs hidden-xs']) !!}
		                        {!! Form::close() !!}
							</td>
						@endif
					</tr>
				@endforeach	
		</table>
	</div>
	@endforeach

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
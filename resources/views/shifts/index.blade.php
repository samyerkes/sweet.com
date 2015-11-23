@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.schedule.index') !!}

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
							<td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$u->pivot->id}}">Remove</button>
	                        <div class="modal fade" id="modal{{$u->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$u->pivot->id}}Label">
	                          <div class="modal-dialog" role="document">
	                            <div class="modal-content">
	                              <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="modal{{$u->pivot->id}}Label">Are you sure you want to remove this user from this shift?</h4>
	                              </div>
	                              <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <style>form{display:inline;}</style>
	                                {!! Form::open(['route' => ['admin.schedule.destroy', $u->pivot->id], 'method' => 'delete']) !!}
			                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
			                        {!! Form::close() !!}
	                              </div>
	                            </div>
	                          </div>
	                        </div>
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
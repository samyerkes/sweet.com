@extends('base')

@section('content')
	
	<h1>Add user shift</h1>

    {!! Form::open(array('action' => 'ScheduleController@update', $shift->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $shift->id) !!}

		<div class="form-group col-md-4 col-sm-4">
    		{!! Form::label('user', 'Select user'); !!}
    		<select name="user" class="form-control">
	            @foreach ($users as $u)
	                <option value="{{ $u->id }}">{{ $u->fname }} {{ $u->lname }}</option>
	            @endforeach
	        </select>
		</div>

		<div class="form-group col-md-4 col-sm-4">
    		{!! Form::label('start_time', 'Start time'); !!}
    		@include('partials.times', ['name'=>'start_time'])
		</div>

		<div class="form-group col-md-4 col-sm-4">
    		{!! Form::label('end_time', 'End time'); !!}
    		@include('partials.times', ['name'=>'end_time'])
		</div>
		
		<div class="col-md-12">
			{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}
		</div>

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
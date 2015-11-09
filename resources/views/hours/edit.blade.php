@extends('base')

@section('content')
	
		
	<h1>Edit {{ $hour->day }}'s hours</h1>

    {!! Form::open(array('action' => 'HoursController@update', $hour->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $hour->id) !!}

    	<div class="form-group">
    		{!! Form::label('hours', 'Hours'); !!}
    		{!! Form::text('hours', $hour->hours, array('class' => 'form-control', 'placeholder'=>$hour->hours)); !!}
		</div>


		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
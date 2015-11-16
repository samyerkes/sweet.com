@extends('base')

@section('content')
	<h1>Create new User</h1>

    {!! Form::open(array('action' => 'UserController@store')) !!}

    	<div class="form-group">
    		{!! Form::label('fname', 'First name'); !!}
    		{!! Form::text('fname', null, array('class' => 'form-control', 'placeholder'=>'First name')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('lname', 'Last name'); !!}
    		{!! Form::text('lname', null, array('class' => 'form-control', 'placeholder'=>'Last name')); !!}
		</div>
    	
    	<div class="form-group">
    		{!! Form::label('email', 'Email'); !!}
    		{!! Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'Email')); !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('role', 'Role'); !!}
			{!! Form::select('role', array('1' => 'Manager', '2' => 'Employee', '3'=>'Customer'), null, ['class' => 'form-control']); !!}	
		</div>
		
		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
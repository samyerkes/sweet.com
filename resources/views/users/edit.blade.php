@extends('base')

@section('content')
	<h1>Edit User</h1>

    {!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.users.update', $user->id ] ]) !!}

    	<div class="form-group">
    		{!! Form::label('fname', 'First Name'); !!}
    		{!! Form::text('fname', $user->fname, array('class' => 'form-control', 'placeholder'=>$user->fname)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('lname', 'Last Name'); !!}
    		{!! Form::text('lname', $user->lname, array('class' => 'form-control', 'placeholder'=>$user->lname)); !!}
		</div>
    	
    	<div class="form-group">
    		{!! Form::label('email', 'Email'); !!}
    		{!! Form::text('email', $user->email, array('class' => 'form-control', 'placeholder'=>$user->email)); !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('role', 'Role'); !!}
			{!! Form::select('role', array('1' => 'Manager', '2' => 'Employee', '3'=>'Customer'), $user->role_id, ['class' => 'form-control']); !!}	
		</div>
		
		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
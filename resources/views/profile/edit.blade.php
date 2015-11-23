@extends('base')

@section('content')
		
	<h1>Edit Profile</h1>

    {!! Breadcrumbs::render('profile.edit', $user) !!}

    {!! Form::open(array('action' => 'ProfileController@update', $user->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $user->id) !!}

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
            {!! Form::label('password', 'Old password'); !!}
            {!! Form::text('password', null, array('class' => 'form-control', 'placeholder'=>'Old password')); !!}
        </div>  

        <div class="form-group">
            {!! Form::label('confirm_password', 'Confirm old password'); !!}
            {!! Form::text('confirm_password', null, array('class' => 'form-control', 'placeholder'=>'Confirm old password')); !!}
        </div>  

        <div class="form-group">
            {!! Form::label('new_password', 'New password'); !!}
            {!! Form::text('new_password', null, array('class' => 'form-control', 'placeholder'=>'New password')); !!}
        </div>  

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
@extends('base')

@section('content')
		
	<h1>Edit Profile</h1>

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

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
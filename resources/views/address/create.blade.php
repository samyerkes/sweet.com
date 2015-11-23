@extends('base')

@section('content')
	
	<h1>Create address</h1>

	{!! Breadcrumbs::render('profile.address.create', $user) !!}

    {!! Form::open(array('action' => 'AddressController@store')) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('street', 'Street'); !!}
    		{!! Form::text('street', null, array('class' => 'form-control', 'placeholder'=>'Steet')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('city', 'City'); !!}
    		{!! Form::text('city', null, array('class' => 'form-control', 'placeholder'=>'City')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('state', 'State'); !!}
    		@include('partials.statesNull')
		</div>

		<div class="form-group">
    		{!! Form::label('zip', 'Zip code'); !!}
    		{!! Form::text('zip', null, array('class' => 'form-control', 'placeholder'=>'Zip code')); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
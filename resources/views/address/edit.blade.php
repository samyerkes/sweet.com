@extends('base')

@section('content')
	
		
	<h1>Edit address</h1>

    {!! Form::open(array('action' => 'AddressController@update', $address->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $address->id) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', $address->name, array('class' => 'form-control', 'placeholder'=>$address->name)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('street', 'Street'); !!}
    		{!! Form::text('street', $address->street, array('class' => 'form-control', 'placeholder'=>$address->street)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('city', 'City'); !!}
    		{!! Form::text('city', $address->city, array('class' => 'form-control', 'placeholder'=>$address->city)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('state', 'State'); !!}
    		@include('partials.states')
		</div>

		<div class="form-group">
    		{!! Form::label('zip', 'Zip code'); !!}
    		{!! Form::text('zip', $address->zip, array('class' => 'form-control', 'placeholder'=>$address->zip)); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
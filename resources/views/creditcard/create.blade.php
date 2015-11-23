@extends('base')

@section('content')
	
	<h1>Create saved credit card</h1>

	{!! Breadcrumbs::render('profile.card.create', $currentUser) !!}

    {!! Form::open(array('action' => 'CreditCardController@store')) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('number', 'Number'); !!}
    		{!! Form::number('number', null, array('class' => 'form-control', 'placeholder'=>'XXXX-XXXX-XXXX-XXXX')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('expiration', 'Expiration'); !!}
    		{!! Form::number('expiration', null, array('class' => 'form-control', 'placeholder'=>'01/17')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('cvc', 'Security number'); !!}
    		{!! Form::number('cvc', null, array('class' => 'form-control', 'placeholder'=>'Security number')); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
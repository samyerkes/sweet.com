@extends('base')

@section('content')
	
	<h1>Edit saved credit card</h1>

    {!! Form::open(array('action' => 'CreditCardController@update', $creditcard->id, 'method' => 'PUT')) !!}

    	{!! Form::hidden('id', $creditcard->id) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', $creditcard->name, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('number', 'Number'); !!}
    		{!! Form::number('number', $creditcard->number, array('class' => 'form-control', 'placeholder'=>'XXXX-XXXX-XXXX-XXXX')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('expiration', 'Expiration'); !!}
    		{!! Form::number('expiration', $creditcard->expiration, array('class' => 'form-control', 'placeholder'=>'01/17')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('cvc', 'Security number'); !!}
    		{!! Form::number('cvc', $creditcard->cvc, array('class' => 'form-control', 'placeholder'=>'Security number')); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
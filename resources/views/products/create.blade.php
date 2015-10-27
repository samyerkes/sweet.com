@extends('base')

@section('content')
	<h1>Add Product</h1>

    {!! Form::open(array('action' => 'ProductController@store')) !!}
		<div class="form-group">
    		{!! Form::label('Name', 'Name'); !!}
    		{!! Form::text('Name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
			{!! Form::label('Price', 'Price'); !!}
	    	{!! Form::number('Price', null, array('class' => 'form-control', 'placeholder'=>'Price')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Description', 'Description'); !!}
    		{!! Form::text('Description', null, array('class' => 'form-control', 'placeholder'=>'Description')); !!}
		</div>

	    <div class="form-group">
			{!! Form::label('Quantity', 'Quantity'); !!}
	    	{!! Form::number('Quantity', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection
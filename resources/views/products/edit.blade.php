@extends('base')

@section('content')
	<h1>Edit Product</h1>

    {!! Form::open(array('action' => 'ProductController@update', $product->id, 'method' => 'PUT')) !!}

    		{!! Form::hidden('id', $product->id) !!}

        	<div class="form-group">
	    		{!! Form::label('Name', 'Name'); !!}
	    		{!! Form::text('Name', $product->name, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
			</div>
        
    		<div class="form-group">
				{!! Form::label('Price', 'Price'); !!}
		    	{!! Form::number('Price', $product->price, array('class' => 'form-control', 'placeholder'=>'Price')); !!}
			</div>

			<div class="form-group">
	    		{!! Form::label('Description', 'Description'); !!}
	    		{!! Form::text('Description', $product->description, array('class' => 'form-control', 'placeholder'=>'Description')); !!}
			</div>

		    <div class="form-group">
				{!! Form::label('Quantity', 'Quantity'); !!}
		    	{!! Form::number('Quantity', $product->inventory, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
			</div>

    	{!! Form::submit('Update', array('class'=>'btn btn-primary')); !!}

	{!! Form::close() !!}
@endsection
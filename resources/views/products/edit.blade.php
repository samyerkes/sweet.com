@extends('base')

@section('content')
	<h1>Edit Product</h1>

	{!! Breadcrumbs::render('admin.products.edit', $product) !!}

	{!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.products.update', $product->id ], 'id'=>'myform', 'files' => true ]) !!}

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
				@include('partials.quill-open')
					{!! $product->description !!}
				@include('partials.quill-close')
				{!! Form::hidden('Description', 'Description', array('id' => 'quill')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Image', 'Image'); !!}
				{!! Form::file('Image') !!}
			</div>

			<div class="form-group">
		        {!! Form::label('Category', 'Product category'); !!}
				<select name="Category" class="form-control">
		            @foreach ($categories as $c)
		                <option value="{{ $c->id }}">{{ $c->name }}</option>
		            @endforeach
		        </select>
	        </div>

		    <div class="form-group">
				{!! Form::label('Quantity', 'Quantity'); !!}
		    	{!! Form::number('Quantity', $product->inventory, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
			</div>

			<div class="form-group">
				{!! Form::label('Show', 'Show publicly'); !!}
				{!! Form::checkbox('Show', null, empty($product->deleted_at)); !!}
			</div>

    	{!! Form::submit('Update', array('class'=>'btn btn-primary')); !!}

	{!! Form::close() !!}
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

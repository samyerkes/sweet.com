@extends('base')

@section('content')
	<h1>Add Product</h1>

	{!! Breadcrumbs::render('admin.products.create') !!}

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    {!! Form::open(array('action' => 'ProductController@store', 'id'=>'myform', 'files' => true)) !!}
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
			@include('partials.quill-open')
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
	    	{!! Form::number('Quantity', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
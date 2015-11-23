@extends('base')

@section('content')
	<h1>Add supplier</h1>

	{!! Breadcrumbs::render('admin.supplier.create') !!}

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    {!! Form::open(array('action' => 'SupplierController@store')) !!}
		
		<div class="form-group">
    		{!! Form::label('Name', 'Name'); !!}
    		{!! Form::text('Name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Email', 'Email'); !!}
    		{!! Form::text('Email', null, array('class' => 'form-control', 'placeholder'=>'Email')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Phone', 'Phone'); !!}
    		{!! Form::text('Phone', null, array('class' => 'form-control', 'placeholder'=>'Phone')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Address', 'Address'); !!}
    		{!! Form::text('Address', null, array('class' => 'form-control', 'placeholder'=>'Address')); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
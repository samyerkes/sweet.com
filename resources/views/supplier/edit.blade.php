@extends('base')

@section('content')
	<h1>Add supplier</h1>

	{!! Breadcrumbs::render('admin.supplier.edit', $supplier) !!}

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    {!! Form::open(array('action' => 'SupplierController@update', $supplier->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $supplier->id) !!}
		
		<div class="form-group">
    		{!! Form::label('Name', 'Name'); !!}
    		{!! Form::text('Name', $supplier->name, array('class' => 'form-control', 'placeholder'=>$supplier->name)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Email', 'Email'); !!}
    		{!! Form::text('Email', $supplier->email, array('class' => 'form-control', 'placeholder'=>$supplier->email)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Phone', 'Phone'); !!}
    		{!! Form::text('Phone', $supplier->phone, array('class' => 'form-control', 'placeholder'=>$supplier->phone)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Address', 'Address'); !!}
    		{!! Form::text('Address', $supplier->address, array('class' => 'form-control', 'placeholder'=>$supplier->address)); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
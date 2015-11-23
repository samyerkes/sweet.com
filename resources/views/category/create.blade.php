@extends('base')

@section('content')
	
	<h1>Create product category</h1>

	{!! Breadcrumbs::render('admin.category.create') !!}

    {!! Form::open(array('action' => 'CategoryController@store')) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
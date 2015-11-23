@extends('base')

@section('content')
	
	{!! Breadcrumbs::render('admin.category.edit') !!}

	<h1>Edit product category</h1>

    {!! Form::open(array('action' => 'CategoryController@update', $category->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $category->id) !!}

    	<div class="form-group">
    		{!! Form::label('name', 'Name'); !!}
    		{!! Form::text('name', $category->name, array('class' => 'form-control', 'placeholder'=>$category->name)); !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
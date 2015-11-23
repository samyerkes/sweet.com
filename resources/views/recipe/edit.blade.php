@extends('base')

@section('content')
		
	<h1>Edit product recipe</h1>

	{!! Breadcrumbs::render('admin.recipe.edit', $product) !!}

    {!! Form::open(array('action' => 'AddressController@update', $product->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $product->id) !!}

    	<div class="form-group">
			{!! Form::label('Recipe', 'Recipe'); !!}
			@include('partials.quill-open')
				{!! $product->recipe !!}
			@include('partials.quill-close')
			{!! Form::hidden('Recipe', 'Recipe', array('id' => 'quill')) !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
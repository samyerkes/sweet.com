@extends('base')

@section('content')
		
	<h1>Edit product recipe</h1>

	{!! Breadcrumbs::render('admin.recipe.edit', $product) !!}

    {!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.recipe.update', $product->id ], 'id'=>'myform' ]) !!}

		{!! Form::hidden('id', $product->id) !!}

    	<div class="form-group">
			{!! Form::label('Description', 'Recipe'); !!}
			@include('partials.quill-open')
				{!! $product->recipe !!}
			@include('partials.quill-close')
			{!! Form::hidden('Description', 'Description', array('id' => 'quill')) !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
@extends('base')

@section('content')
	<h1>Add ingredient</h1>

	{!! Breadcrumbs::render('admin.recipe.ingredient.add', $product) !!}

	{!! Form::open(array('action' => 'IngredientController@AddStore')) !!}

		{!! Form::hidden('product_id', $product->id) !!}

		<div class="form-group">
		    {!! Form::label('Ingredient', 'Ingredient'); !!}
			<select name="Ingredient" class="form-control">
		        @foreach ($ingredients as $i)
		            <option value="{{ $i->id }}">{{ $i->name }}</option>
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
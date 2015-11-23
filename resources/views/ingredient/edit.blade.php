@extends('base')

@section('content')
	<h1>Add Ingredient</h1>

	{!! Breadcrumbs::render('admin.ingredient.edit', $ingredient) !!}

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    {!! Form::open(array('action' => 'IngredientController@update', $ingredient->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $ingredient->id) !!}
		
		<div class="form-group">
    		{!! Form::label('Name', 'Name'); !!}
    		{!! Form::text('Name', $ingredient->name, array('class' => 'form-control', 'placeholder'=>$ingredient->name)); !!}
		</div>

		<div class="form-group">
            {!! Form::label('Supplier', 'Supplier'); !!}
            <select name="Supplier" class="form-control">
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>

		<div class="form-group">
    		{!! Form::label('Quantity', 'Quantity'); !!}
    		{!! Form::number('Quantity', $ingredient->quantity, array('class' => 'form-control', 'placeholder'=>$ingredient->quantity)); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Unit', 'Unit'); !!}
    		{!! Form::text('Unit', $ingredient->unit, array('class' => 'form-control', 'placeholder'=>$ingredient->unit)); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
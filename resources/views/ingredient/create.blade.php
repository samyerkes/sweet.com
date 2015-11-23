@extends('base')

@section('content')
	<h1>Add Ingredient</h1>

	{!! Breadcrumbs::render('admin.ingredient.create') !!}

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    {!! Form::open(array('action' => 'IngredientController@store')) !!}
		
		<div class="form-group">
    		{!! Form::label('Name', 'Name'); !!}
    		{!! Form::text('Name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
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
    		{!! Form::number('Quantity', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
		</div>

		<div class="form-group">
    		{!! Form::label('Unit', 'Unit'); !!}
    		{!! Form::text('Unit', null, array('class' => 'form-control', 'placeholder'=>'Unit')); !!}
		</div>

    	{!! Form::submit('Submit', array('class'=>'btn btn-primary')); !!}
	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
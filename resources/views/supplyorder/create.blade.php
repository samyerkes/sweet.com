@extends('base')

@section('content')
    
    <h1>Create ingredient order</h1>

    {!! Breadcrumbs::render('admin.supplyorder.create') !!}

    {!! Form::open(array('action' => 'CategoryController@store')) !!}

        <div class="form-group">
            {!! Form::label('Supplier', 'Supplier'); !!}
            <select name="Supplier" class="form-control">
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('Ingredient', 'Ingredient'); !!}
            <select name="Ingredient" class="form-control">
                @foreach ($ingredients as $i)
                    <option value="i{ $s->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('Quantity', 'Quantity'); !!}
            {!! Form::number('Quantity', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
        </div>

        {!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

    {!! Form::close() !!}
        
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
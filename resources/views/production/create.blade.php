@extends('base')

@section('content')
    
    <h1>Create production schedule</h1>

    {!! Breadcrumbs::render('admin.production.index') !!}

    {!! Form::open(array('action' => 'ProductionController@store')) !!}

        <div class="form-group">
            {!! Form::label('Product', 'Product'); !!}
            <select name="Product" class="form-control">
                @foreach ($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->units_per_batch }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('Batches', 'Number of batches'); !!}
            {!! Form::number('Batches', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
        </div>

        <div class="form-group">
            {!! Form::label('Date', 'Production date'); !!}
            {!! Form::date('Date', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
        </div>

        {!! Form::submit('Create', array('class'=>'btn btn-success')); !!}

    {!! Form::close() !!}
        
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
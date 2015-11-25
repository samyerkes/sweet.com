@extends('base')

@section('content')
	
	{!! Breadcrumbs::render('admin.category.edit') !!}

	<h1>Edit production schedule</h1>
    <p><a href="{{ route('admin.recipe.show', array('id' => $productionschedule->product_id)) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> See recipe</a></p>

    {!! Form::open(array('action' => 'ProductionController@update', $productionschedule->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $productionschedule->id) !!}
		
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
            {!! Form::number('Batches', $productionschedule->batches, array('class' => 'form-control', 'placeholder'=>$productionschedule->batches)); !!}
        </div>

        <div class="form-group">
            {!! Form::label('Date', 'Production date'); !!}
            {!! Form::date('Date', $productionschedule->proddate, array('class' => 'form-control', 'placeholder'=>$productionschedule->proddate)); !!}
        </div>

        <div class="form-group">
            {!! Form::label('Status', 'Status'); !!}
            <select name="Status" class="form-control">
                @foreach ($statuses as $s)
                    <option value="{{ $s->id }}">{{ $s->status }}</option>
                @endforeach
            </select>
        </div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
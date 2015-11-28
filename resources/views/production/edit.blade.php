@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.production.edit', $productionschedule) !!}

	@if ($currentUser->role->id > 1)
		<div class="panel panel-default">
			<div class="panel-heading">
				Production #{{ $productionschedule->id }}
				<a href="{{ route('admin.recipe.show', array('id' => $productionschedule->product_id)) }}" class="btn btn-primary btn-xs pull-right">View {{ $productionschedule->product->name }} recipe</a>
			</div>
			<div class="panel-body">
				{{ $productionschedule->batches }} batch of {{ $productionschedule->product->name }} on {{ date('F d, Y', strtotime($productionschedule->proddate)) }}.
			</div>
		</div>
	@endif

	@if ($currentUser->role->id == 1)
	<h1>Edit production schedule</h1>
    <p><a href="{{ route('admin.recipe.show', array('id' => $productionschedule->product_id)) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> See recipe</a></p>
	@endif

    {!! Form::open(array('action' => 'ProductionController@update', $productionschedule->id, 'method' => 'PUT')) !!}

		{!! Form::hidden('id', $productionschedule->id) !!}

		@if ($currentUser->role->id == 1)
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
			@endif

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

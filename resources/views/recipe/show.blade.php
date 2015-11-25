@extends('base')

@section('content')

    {!! Breadcrumbs::render('admin.recipe.show', $product) !!}

		<div class="panel panel-default">
			<div class="panel-heading">
				{{ $product->name }} ingredients (makes {{ $product->units_per_batch }} units per batch)<a href="{{ route('admin.recipe.ingredient.add', array('product' => $product->id)) }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
			</div>
			<table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Quantity</th>
                <th></th>
            </thead>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->pivot->quantity }} {{ $ingredient->unit}}</td>
                    <td>
                        {!! Form::open(['route' => ['admin.recipe.destroy', $ingredient->pivot->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>	
	</div>

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $product->name }} recipe details <a href="{{ route('admin.recipe.edit', array('id' => $product->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
        </div>
        <div class="panel-body">
            {!! $product->recipe !!}    
        </div>
    </div>
	
	
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
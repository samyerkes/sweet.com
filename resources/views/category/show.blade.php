@extends('base')

@section('content')
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="{{ route('admin.products.show', array('id' => $product->id)) }}">{{ $product->name }} ingredients</a> <a href="{{ route('admin.recipe.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
			</div>
			<table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </thead>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->pivot->quantity }}</td>
                    

                    <td><a href="{{ route('profile.card.edit', array('id' => $ingredient->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    <td>
                        {!! Form::open(['route' => ['profile.card.destroy', $ingredient->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>	
	</div>
	
	
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.products.index') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			All products <a href="{{ route('admin.products.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
	    <table class="table table-striped">
	    	<thead>
	    		<th>ID</th>
		    	<th>Name</th>
		    	<th>Category</th>
		    	<th>Price</th>
		    	<th>Quantity</th>
	    	</thead>
	    	@foreach ($products as $p)
	    		<tr>
	    			<td><a href="{{ route('admin.products.show', array('id' => $p->id)) }}">{{ $p->id }}</a></td>
		    		<td>{{ $p->name }}</td>
		    		<td>{{ $p->category->name }}</td>
		    		<td>${{ $p->price }}</td>
		    		<td>{{ $p->inventory }}</td>
		    	</tr>
	    	@endforeach
	    </table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

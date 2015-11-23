@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.products.low') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			Products with low inventories
		</div>
	    <table class="table table-striped">
	    	<thead>
	    		<th>ID</th>
		    	<th>Name</th>
		    	<th>Quantity</th>	
	    	</thead>
	    	@foreach ($products as $p)
	    		<tr>
	    			<td><a href="{{ route('admin.products.show', array('id' => $p->id)) }}">{{ $p->id }}</a></td>
		    		<td>{{ $p->name }}</td>
		    		<td>{{ $p->inventory }}</td>
		    	</tr>
	    	@endforeach
	    </table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
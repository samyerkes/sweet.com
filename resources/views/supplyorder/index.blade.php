@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.supplyorder.index') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			All supply orders <a href="{{ route('admin.supplyorder.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
	    <table class="table table-striped">
	    	<thead>
	    		<th>ID</th>
		    	<th>Supplier</th>
		    	<th>Date</th>
		    	<th>Status</th>
	    	</thead>
	    	<tbody>
	    		@foreach($supplyorder as $s)
	    		<tr>
	    			<td><a href="{{ route('admin.supplyorder.show', array('id' => $s->id)) }}">{{ $s->id }}</a></td>
	    			<td>{{ $s->supplier->name }}</td>
	    			<td>{{ date('F d, Y', strtotime($s->created_at)) }}</td>
	    			<td>{{ $s->status->status }}</td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
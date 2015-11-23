@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.supplier.index') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			All suppliers <a href="{{ route('admin.supplier.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
	    <table class="table table-striped">
	    	<thead>
		    	<th>Name</th>
		    	<th>Email</th>
		    	<th>Phone</th>
		    	<th>Address</th>
		    	<th></th>
		    	<th></th>
	    	</thead>
	    	@foreach ($suppliers as $s)
	    		<tr>
		    		<td>{{ $s->name }}</td>
		    		<td>{{ $s->email }}</td>
		    		<td>{{ $s->phone }}</td>
		    		<td>{{ $s->address }}</td>
					<td><a href="{{ route('admin.supplier.edit', array('id' => $s->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
					<td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$s->id}}">Remove</button>
	                        <div class="modal fade" id="modal{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$s->id}}Label">
	                          <div class="modal-dialog" role="document">
	                            <div class="modal-content">
	                              <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="modal{{$s->id}}Label">Are you sure you want to remove this supplier?</h4>
	                              </div>
	                              <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <style>form{display:inline;}</style>
	                                {!! Form::open(['route' => ['admin.supplier.destroy', $s->id], 'method' => 'delete']) !!}
			                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
			                        {!! Form::close() !!}
	                              </div>
	                            </div>
	                          </div>
	                        </div>
	                    </td>

		    	</tr>
	    	@endforeach
	    </table>
	</div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
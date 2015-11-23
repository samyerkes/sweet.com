@extends('base')

@section('content')

	{!! Breadcrumbs::render('admin.ingredient.index') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			All ingredients <a href="{{ route('admin.ingredient.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
	    <table class="table table-striped">
	    	<thead>
		    	<th>Name</th>
		    	<th>Supplier</th>
		    	<th>Quantity</th>
		    	<th></th>
		    	<th></th>
	    	</thead>
	    	@foreach ($ingredients as $i)
	    		<tr>
		    		<td>{{ $i->name }}</td>
		    		<td>{{ $i->supplier->name }}</td>
		    		<td>{{ $i->quantity }} {{ $i->unit }}</td>
		    		<td><a href="{{ route('admin.ingredient.edit', array('id' => $i->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
					<td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$i->id}}">Remove</button>
	                        <div class="modal fade" id="modal{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$i->id}}Label">
	                          <div class="modal-dialog" role="document">
	                            <div class="modal-content">
	                              <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="modal{{$i->id}}Label">Are you sure you want to remove this ingredient?</h4>
	                              </div>
	                              <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <style>form{display:inline;}</style>
	                                {!! Form::open(['route' => ['admin.ingredient.destroy', $i->id], 'method' => 'delete']) !!}
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
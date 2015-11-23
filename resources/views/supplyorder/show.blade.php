@extends('base')

@section('content')
        
        {!! Breadcrumbs::render('admin.supplyorder.show', $supplyorder) !!}

		<div class="panel panel-default">
			<div class="panel-heading">
				Supply order #{{ $supplyorder->id }}
                <div class="pull-right">
                    @if ($supplyorder->status->id == 2)
                        Ordered on: 
                    @elseif ($supplyorder->status->id == 3)
                        Received on:
                    @endif
                    {{ date('F d, Y', strtotime($supplyorder->updated_at)) }}
                </div>
			</div>
			<table class="table tabled-striped">
                <thead>
                    <th>Ingredient</th>
                    <th>Quantity</th>
                    @if ($supplyorder->status->id == 1)
                        <th></th>
                    @endif
                </thead>
                @foreach($supplyorder->ingredients as $s)
                    <tr>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->pivot->quantity }}</td>
                        @if ($supplyorder->status->id == 1)
                            <td>
                                <button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$s->pivot->id}}">Remove</button>
                                <div class="modal fade" id="modal{{$s->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$s->id}}Label">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modal{{$s->pivot->id}}Label">Are you sure you want to remove this ingredient from this supply order?</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <style>form{display:inline;}</style>
                                        {!! Form::open(['route' => ['admin.supplyorder.destroy', $s->pivot->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach                
            </table>
             @if ($supplyorder->status->id == 1)
                <div class="panel-footer">
                    <div class="row">
                        {!! Form::open(array('action' => 'SupplyOrderController@store')) !!}
                            {!! Form::hidden('supplyorder_id', $supplyorder->id); !!}
                        <div class="col-md-5">
                            <select name="Ingredient" class="form-control">
                                @foreach ($ingredients as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }} - {{ $i->unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            {!! Form::number('Quantity', null, array('class' => 'form-control', 'placeholder'=>'Quantity')); !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::submit('Add to order', array('class'=>'btn btn-success btn-sm')); !!}  </td>
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            @endif
    	</div>

        @if ($supplyorder->status->id == 1)
            {!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.supplyorder.update', $supplyorder->id ] ]) !!}
                {!! Form::hidden('id', $supplyorder->id) !!}
                {!! Form::hidden('status', $supplyorder->status->id) !!}
                
                <div class="form-group">
                    {!! Form::label('Supplier', 'Supplier'); !!}
                    <select name="Supplier" class="form-control">
                        @foreach ($suppliers as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                {!! Form::submit('Submit order', array('class' => 'btn-success btn-lg btn pull-right' )) !!}
            {!! Form::close() !!}
        @endif

        @if ($supplyorder->status->id == 2)
            {!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.supplyorder.update', $supplyorder->id ] ]) !!}
                {!! Form::hidden('id', $supplyorder->id) !!}
                {!! Form::hidden('status', $supplyorder->status->id) !!}
                {!! Form::submit('Mark order as received', array('class' => 'btn-success btn-lg btn pull-right' )) !!}
            {!! Form::close() !!}
        @endif
	
	
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
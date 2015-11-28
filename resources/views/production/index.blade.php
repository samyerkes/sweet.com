@extends('base')

@section('content')

    {!! Breadcrumbs::render('admin.production.index') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            All production schedules 
            @if ($currentUser->role->id == 1)
                <a href="{{ route('admin.production.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
                <th>Product</th>
                <th>Number of batches</th>
                <th>Production date</th>
                <th>Status</th>
                <th></th>
                @if ($currentUser->role->id == 1)
                    <th></th>
                @endif
            </thead>
            @foreach($batches as $b)
                <tr>
                    <td>{{ $b->product->name }}</td>
                    <td>{{ $b->batches }}</td>
                    <td>{{ date('F d, Y', strtotime($b->proddate)) }}</td>
                    <td>{{ $b->status->status }}</td>
                    <td><a href="{{ route('admin.production.edit', array('id' => $b->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    @if ($currentUser->role->id == 1)
                        <td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$b->id}}">Remove</button>
                            <div class="modal fade" id="modal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$b->id}}Label">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modal{{$b->id}}Label">Are you sure you want to remove this production schedule?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <style>form{display:inline;}</style>
                                    {!! Form::open(['route' => ['admin.production.destroy', $b->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Remove', ['class'=>'btn btn-danger']) !!}
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
    </div>


@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
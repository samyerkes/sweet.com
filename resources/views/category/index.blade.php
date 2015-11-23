@extends('base')

@section('content')

    {!! Breadcrumbs::render('admin.category.index') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            All product categories <a href="{{ route('admin.category.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th></th>
                <th></th>
            </thead>
            @foreach($categories as $c)
                <tr>
                    <td><a href="{{ route('admin.category.show', array('id' => $c->id)) }}">{{ $c->id }}</a></td>
                    <td>{{ $c->name }}</td>
                    <td><a href="{{ route('admin.category.edit', array('id' => $c->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    <td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$c->id}}">Remove</button>
                        <div class="modal fade" id="modal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$c->id}}Label">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal{{$c->id}}Label">Are you sure you want to remove this category?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <style>form {display:inline;}</style>
                                {!! Form::open(['route' => ['admin.category.destroy', $c->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Remove', array('class' => 'btn-danger btn' )) !!}
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
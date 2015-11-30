@extends('base')

@section('content')

    {!! Breadcrumbs::render('admin.pages.index') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            All pages <a href="{{ route('admin.pages.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Order</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </thead>
            @foreach($pages as $p)
                <tr>
                    <td><a href="/{{ $p->slug }}">{{ $p->name }}</a></td>
                    <td>{{ $p->order }}</td>
                    <td>/{{ $p->slug }}</td>
                    <td><a href="{{ route('admin.pages.edit', array('id' => $p->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    <td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$p->id}}">Remove</button>
                        <div class="modal fade" id="modal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$p->id}}Label">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal{{$p->id}}Label">Are you sure you want to remove this page?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <style>form {display:inline;}</style>
                                {!! Form::open(['route' => ['admin.pages.destroy', $p->id], 'method' => 'delete']) !!}
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

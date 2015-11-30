@extends('base')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    {!! Breadcrumbs::render('admin.pages.index') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            All pages <a href="{{ route('admin.pages.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th></th>
                <th>Name</th>
                <th>Order</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </thead>
            <tbody class="sortable" data-entityname="pages">
            @foreach($pages as $p)
                <tr data-itemId="{{{ $p->id }}}">
                    <td class="sortable-handle"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></td>
                    <td><a href="/{{ $p->slug }}">{{ $p->name }}</a></td>
                    <td>{{ $p->position }}</td>
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
          </tbody>
        </table>
    </div>
@endsection

@section('scripts')
  <script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
  <script src="../../js/sort.js"></script>
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection

@extends('base')

@section('content')

    {!! Breadcrumbs::render('profile.address.index', $user) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $user->fname }}'s default addresses <a href="{{ route('profile.address.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>Zip</th>
                <th></th>
                <th></th>
            </thead>
            @foreach($addresses as $addr)
                <tr>
                    <td>{{ $addr->name }}</td>
                    <td>{{ $addr->street }}</td>
                    <td>{{ $addr->city }}</td>
                    <td>{{ $addr->state }}</td>
                    <td>{{ $addr->zip }}</td>
                    <td><a href="{{ route('profile.address.edit', array('id' => $addr->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    <td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$addr->id}}">Remove</button>
                        <div class="modal fade" id="modal{{$addr->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$addr->id}}Label">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal{{$addr->id}}Label">Are you sure you want to remove this address?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <style>form{display:inline;}</style>
                                {!! Form::open(['route' => ['profile.address.destroy', $addr->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Remove', ['class'=>'btn btn-danger']) !!}
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
    @include('sidebar.special')
@endsection
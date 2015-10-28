@extends('base')

@section('content')

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
                    <td>
                        {!! Form::open(['route' => ['profile.address.destroy', $addr->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
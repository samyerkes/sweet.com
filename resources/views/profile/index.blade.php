@extends('base')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $user->fname }} {{ $user->lname }} <a href="{{ route('profile.edit', array('id' => $user->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
        </div>
        <div class="panel-body">
            <strong>Email:</strong> {{ $user->email }}<br />
            <strong>User since :</strong> {{ $user->created_at }}<br />
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $user->fname }}'s default addresses <a href="{{ route('profile.address.index') }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
        </div>
        
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
            </thead>
            @foreach($addresses as $addr)
                <tr>
                    <td>{{ $addr->name }}</td>
                    <td>{{ $addr->street }}</td>
                    <td>{{ $addr->city }}</td>
                    <td>{{ $addr->state }}</td>
                    <td>{{ $addr->zip }}</td>
                </tr>
            @endforeach
        </table>
        
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $user->fname }}'s orders
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Date</th>
                <th>Status</th>
            </thead>
            @foreach($user->order as $order)
                <tr>
                    <td><a href="{{ route('profile.show', array('id' => $order->id)) }}">{{ $order->id }}</a></td>
                    <td>{{ $order->dateOrdered }}</td>
                    <td>
                        @if ( $order->status_id == 1)
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        @elseif ( $order->status_id == 3)
                            <span class="glyphicon glyphicon-ok"></span>
                        @else
                            <span class="glyphicon glyphicon-arrow-right"></span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
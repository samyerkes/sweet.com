@extends('base')

@section('content')

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
                            <span class="glyphicon glyphicon-remove"></span>
                        @else
                            <span class="glyphicon glyphicon-ok"></span>
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
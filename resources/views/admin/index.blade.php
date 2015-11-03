@extends('base')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>
                <ul class="list-group">
                    @if ($currentUser->role->id == 1)
                        <li class="list-group-item"><a href="{{ route('admin.orders.index') }}">All</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.orders.completed' )}}">Completed</a></li>
                    @endif
                    <li class="list-group-item"><a href="{{ route('admin.orders.pending' )}}">Pending</a></li>
                </ul>
            </div>

            @if ($currentUser->role->id == 1)
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.products.index') }}">Edit</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.products.low') }}">Low inventory</a></li>
                    </ul>
                </div>
            @endif
        </div>
        
        
        @if ($currentUser->role->id == 1)
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.users.index') }}">All users</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.schedule.index') }}">Employee schedule</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Store</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Hours</a></li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Metrics</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.metrics.index') }}">Orders</a></li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
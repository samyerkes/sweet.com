@extends('base')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('admin.orders.create') }}">Make order</a></li>
                    @if ($currentUser->role->id == 1)
                        <li class="list-group-item"><a href="{{ route('admin.orders.index') }}">All orders</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.orders.completed' )}}">Completed orders</a></li>
                    @endif
                    <li class="list-group-item"><a href="{{ route('admin.orders.pending' )}}">Pending orders</a></li>
                </ul>
            </div>

            @if ($currentUser->role->id == 1)
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.products.index') }}">Edit products</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.category.index') }}">Manage product categories</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.products.low') }}">Low inventory</a></li>
                        <li class="list-group-item"><a href="#">Manage reviews</a></li>
                    </ul>
                </div>
            @endif
        </div>
        
        
        
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <ul class="list-group">
                        @if ($currentUser->role->id == 1)
                            <li class="list-group-item"><a href="{{ route('admin.users.create') }}">Create user</a></li>
                            <li class="list-group-item"><a href="{{ route('admin.users.index') }}">All users</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{ route('admin.schedule.index')}}">Employee schedule</a></li>
                    </ul>
                </div>

            @if ($currentUser->role->id == 1)
                <div class="panel panel-default">
                    <div class="panel-heading">Store</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.hours.index') }}">Hours</a></li>
                    </ul>
                </div>
            @endif
            
            @if ($currentUser->role->id == 1)
                <div class="panel panel-default">
                    <div class="panel-heading">Reports</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.metrics.orders') }}">Transaction metrics</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.metrics.inventory') }}">Product inventory</a></li>
                    </ul>
                </div>
            @endif
            </div>
        

    </div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
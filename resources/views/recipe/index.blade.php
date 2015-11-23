@extends('base')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            All recipes <a href="{{ route('admin.recipe.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
            </thead>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('admin.recipe.show', array('id' => $product->id)) }}">{{ $product->id }}</a></td>
                    <td>{{ $product->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
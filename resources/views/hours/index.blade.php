@extends('base')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Store Hours
        </div>
        <table class="table table-striped">
            <thead>
                <th>Day</th>
                <th>Hours</th>
                <th></th>
            </thead>
            @foreach($hours as $hour)
                <tr>
                    <td>{{ $hour->day }}</td>
                    <td>{{ $hour->hours }}</td>
                    <td><a href="{{ route('admin.hours.edit', array('id' => $hour->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
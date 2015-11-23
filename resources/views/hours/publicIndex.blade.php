@extends('base')

@section('content')

    <p>Sweet Sweet Chocolates is located at 1234 Main Street, Richmond, Virginia 23235. Come visit us!</p>

    <div class="panel panel-default">
        <div class="panel-heading">
            Store Hours
        </div>
        <table class="table table-striped">
            <thead>
                <th>Day</th>
                <th>Hours</th>
            </thead>
            @foreach($hours as $hour)
                <tr>
                    <td>{{ $hour->day }}</td>
                    <td>{{ $hour->hours }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
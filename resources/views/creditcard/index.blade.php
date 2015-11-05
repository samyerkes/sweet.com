@extends('base')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $user->fname }}'s default credit cards <a href="{{ route('profile.card.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Number</th>
                <th>Expiration</th>
                <th>CVC</th>
                <th></th>
                <th></th>
            </thead>
            @foreach($creditcards as $cc)
                <tr>
                    <td>{{ $cc->name }}</td>
                    <td>{{ $cc->number }}</td>
                    <td>{{ $cc->expiration }}</td>
                    <td>{{ $cc->cvc }}</td>

                    <td><a href="{{ route('profile.card.edit', array('id' => $cc->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></td>
                    <td>
                        {!! Form::open(['route' => ['profile.card.destroy', $cc->id], 'method' => 'delete']) !!}
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
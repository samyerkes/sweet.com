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
                    <td><button type="button" class="btn btn-danger pull-right btn-xs" data-toggle="modal" data-target="#modal{{$cc->id}}">Remove</button>
                        <div class="modal fade" id="modal{{$cc->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$cc->id}}Label">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal{{$cc->id}}Label">Are you sure you want to remove this credit card?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <style>form{display:inline;}</style>
                                {!! Form::open(['route' => ['profile.card.destroy', $cc->id], 'method' => 'delete']) !!}
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
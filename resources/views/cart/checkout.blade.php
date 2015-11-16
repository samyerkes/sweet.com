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
            Review cart items <span class="pull-right badge">{{ $items->count() }}</span>
        </div>
        <table class="table">
            <thead>
                <th>Item</th>
                <th>Price per unit</th>
                <th>Quantity</th>
                <th>Line total</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><a href="{{ route('product.item', array('id' => $item->id)) }}">{{ $item->name }}</a></td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>${{ number_format($item->pivot->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>Total</th>
                <th></th>
                <th></th>
                <th>${{ number_format($sum, 2) }}</th>
            </tfoot>
        </table>
    </div>

    {!! Form::open(array('action' => 'CartController@submitOrder', $order->id, 'method' => 'PUT')) !!}
    {!! Form::hidden('id', $order->id) !!}
    {!! Form::hidden('total', number_format($sum, 2)) !!}
    <div class="form-group">
        {!! Form::label('address', 'Saved addresses'); !!}
        <select name="address" class="form-control">
            @foreach ($addresses as $addr)
                <option value="{{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}">{{ $addr->name }} - {{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('payment', 'Saved payment methods'); !!}
        <select name="payment" class="form-control">
            @foreach ($creditcards as $cc)
                <option value="{{ $cc->name }}, {{ $cc->number }}, {{ $cc->expiration }}, {{ $cc->cvc }}">{{ $cc->name }} - {{ $cc->number }}</option>
            @endforeach
        </select>
    </div>

    <button type="button" class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#modal">Submit order</button>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalLabel">Are you sure you want to submit this order?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <style>form{display:inline;}</style>
            {!! Form::submit('Submit order', ['class'=>'btn btn-success']) !!}
          </div>
        </div>
      </div>
    </div>


    {!! Form::close() !!}
    
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
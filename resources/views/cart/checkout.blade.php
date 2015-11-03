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
    <div class="form-group">
        {!! Form::label('address', 'Saved addresses'); !!}
        <select name="address" class="form-control">
            @foreach ($addresses as $addr)
                <option value="{{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}">{{ $addr->name }} - {{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('payment', 'Payment method') !!}
        {!! Form::text('payment', null, ['class'=>'form-control', 'placeholder'=>'xxx-xxx-xxxx']) !!}
    </div>

    {!! Form::submit('Submit order', ['class'=>'btn btn-primary btn-lg pull-right']) !!}

    {!! Form::close() !!}
    
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
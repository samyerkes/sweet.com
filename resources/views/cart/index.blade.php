@extends('base')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Current cart items
            @if(!empty($cartItems))
                <span class="pull-right badge">{{ $cartItems }}</span>
            @endif
        </div>
        <table class="table">
            <thead>
                <th>Item</th>
                <th>Price per unit</th>
                <th>Quantity</th>
                <th>Line total</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><a href="{{ route('product.item', array('id' => $item->id)) }}">{{ $item->name }}</a></td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>${{ number_format($item->pivot->quantity * $item->price, 2) }}</td>
                        <td>
                            {!! Form::open(['route' => ['cart.destroy', $item->pivot->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Remove', array('class' => 'btn-danger btn-xs btn pull-right' )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>Total</th>
                <th></th>
                <th></th>
                <th>${{ number_format($sum, 2) }}</th>
                <th></th>
            </tfoot>
        </table>
    </div>

    <a class="btn btn-primary btn-lg pull-right" href="{{ route('cart.checkout') }}">Checkout <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><span class="sr-only">Remove item</span></a>

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection

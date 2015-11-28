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

    <div class="panel panel-default">
        <div class="panel-heading">
            Shipping address
            <div id="shippingmethod" class="btn-group pull-right" data-toggle="buttons">
                <label id="addrsaved-btn" class="btn btn-default btn-xs active">
                    <input type="radio" id="addrsaved" name="addrsaved" value="addrsaved" />Use a saved address
                </label>
                <label id="addrnosaved-btn" class="btn btn-default btn-xs notactive">
                    <input type="radio" name="addrnosaved" value="addrnosaved" />Use a new address
                </label>
            </div>
        </div>
        <div class="panel-body">

            <div id="addrsaved">
                <div class="form-group">
                    {!! Form::label('address', 'Saved addresses'); !!}
                    <select name="address" class="form-control">
                        @foreach ($addresses as $addr)
                            <option value="{{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}">{{ $addr->name }} - {{ $addr->street }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zip }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div id="addrnosaved" style="display:none;">
                <div class="form-group">
                    {!! Form::label('street', 'Street'); !!}
                    {!! Form::text('street', null, array('class' => 'form-control', 'placeholder'=>'Steet')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('city', 'City'); !!}
                    {!! Form::text('city', null, array('class' => 'form-control', 'placeholder'=>'City')); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('state', 'State'); !!}
                    @include('partials.statesNull')
                </div>

                <div class="form-group">
                    {!! Form::label('zip', 'Zip code'); !!}
                    {!! Form::text('zip', null, array('class' => 'form-control', 'placeholder'=>'Zip code')); !!}
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Payment method
            <div id="paymentmethod" class="btn-group pull-right" data-toggle="buttons">
                <label id="ccsaved" class="btn btn-default btn-xs active">
                    <input type="radio" id="ccsaved" name="ccsaved" value="ccsaved" />Use a saved credit card
                </label>
                <label id="ccnosaved" class="btn btn-default btn-xs notactive">
                    <input type="radio" name="ccnosaved" value="ccnosaved" />Use a new credit card
                </label>
            </div>
        </div>
        <div class="panel-body">
            <div id="ccsaved" class="form-group">
                {!! Form::label('payment', 'Saved payment methods'); !!}
                <select name="payment" class="form-control">
                    @foreach ($creditcards as $cc)
                        <option value="{{ $cc->number }}">{{ $cc->name }} - {{ $cc->number }}</option>
                    @endforeach
                </select>
            </div>

            <div id="ccnosaved" class="form-group" style="display:none;">
                {!! Form::label('payment', 'Number'); !!}
                {!! Form::number('foo', 'null', array('class' => 'form-control', 'placeholder'=>'XXXX-XXXX-XXXX-XXXX')); !!}
            </div>
        </div>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#shippingmethod > #addrnosaved-btn').on('click', function() {
                $('.panel-body > #addrsaved').hide();
                $('.panel-body > #addrnosaved').show();
            });
            $('#shippingmethod > #addrsaved-btn').on('click', function() {
                $('.panel-body > #addrnosaved').hide();
                $('.panel-body > #addrsaved').show();
            });
            $('#paymentmethod > #ccnosaved').on('click', function() {
                $('.panel-body #ccsaved').hide();
                $('.panel-body #ccnosaved').show();
                $('.panel-body #ccsaved input.form-control').attr('name', 'foo');
                $('.panel-body #ccnosaved input.form-control').attr('name', 'payment');
            });
            $('#paymentmethod > #ccsaved').on('click', function() {
                $('.panel-body #ccsaved').show();
                $('.panel-body #ccnosaved').hide();
                $('.panel-body #ccnoccsaved input.form-control').attr('name', 'foo');
                $('.panel-body #ccsaved input.form-control').attr('name', 'payment');
            });
        });
    </script>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection

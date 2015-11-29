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

    {!! Form::open(array('action' => 'CartController@submitOrder', $order->id, 'method' => 'PUT', 'id'=>'checkoutForm')) !!}
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
        </div>
        <div class="panel-body">

            <div class="row">
              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label>Card Number</label>
                    <input type="text" size="20" data-stripe="number" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" />
                </div>

                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label>Card CVC</label>
                    <input type="text" size="4" data-stripe="cvc" class="form-control" placeholder="Security Code" />
                </div>
              </div>

                <div class="form-group">
                    <label>Expiration Date</label>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select class="form-control" data-stripe="exp-month">
                            <option value="01">Jan (01)</option>
                            <option value="02">Feb (02)</option>
                            <option value="03">Mar (03)</option>
                            <option value="04">Apr (04)</option>
                            <option value="05">May (05)</option>
                            <option value="06">June (06)</option>
                            <option value="07">July (07)</option>
                            <option value="08">Aug (08)</option>
                            <option value="09">Sep (09)</option>
                            <option value="10">Oct (10)</option>
                            <option value="11">Nov (11)</option>
                            <option value="12">Dec (12)</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <select class="form-control" data-stripe="exp-year">
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                          </select>
                        </div>
                    </div>
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
        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        @if (App::environment('local'))
            Stripe.setPublishableKey('{{ env('STRIPE_TEST_PUB_KEY') }}');
        @else
            Stripe.setPublishableKey('{{ env('STRIPE_LIVE_PUB_KEY') }}');
        @endif
    </script>
    <script>
        jQuery(function($) {$('#checkoutForm').submit(function(event) {var $form = $(this);
        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken($form, stripeResponseHandler);
        // Prevent the form from submitting with the default action
        return false;});});

        function stripeResponseHandler(status, response) {
            var $form = $('#checkoutForm');
            if (response.error) {
                alert(response.error.message);
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        };
    </script>

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection

@extends('base')

@section('content')

	<h1>Create customer order</h1>

	{!! Breadcrumbs::render('admin.orders') !!}

    {!! Form::open(array('action' => 'OrderController@employeeStore', 'id'=>'checkoutForm')) !!}

		<div class="form-group">
	        {!! Form::label('user', 'Customer'); !!}
	        <select name="user" class="form-control">
	        	<option value="1">-- Guest --</option>
	            @foreach ($users as $u)
	                <option value="{{ $u->id }}">{{ $u->lname }}, {{ $u->fname}}</option>
	            @endforeach
	        </select>
	    </div>

		<div class="panel panel-default">
			<div class="panel-heading">Order products</div>
			<div class="panel-body">
				<style>.form-inline {margin: 10px 0; width:100% !important;}</style>
				@foreach ($products as $p)
					<div class="form-inline">
					  <div class="form-group">
					  	<label for="quantity{{ $p->id }}" class="sr-only">{{ $p->name }}</label>
					    <div class="input-group">
					      <div class="input-group-addon"><a href="{{ route('product.item', array('id' => $p->id)) }}">{{ $p->name }}</a></div>
					      <input type="text" name="quantity{{$p->id}}" class="form-control" placeholder="${{$p->price}}">
					    </div>
					  </div>
					</div>
		    	@endforeach
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


		{!! Form::submit('Submit order', array('class'=>'btn btn-success pull-right')); !!}

	{!! Form::close() !!}

@endsection

@section('scripts')
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
    @include('sidebar.admin')
@endsection

@extends('base')

@section('content')
	
	<div class="row">
		<div class="col-md-6">
            <div class="thumbnail">
            	<img src="/uploads/images/products/product-{{$product->id}}.jpg" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-md-6">
        	<h3>{{ $product->name }}</h3>
			<p>${{ $product->price }} per unit</p>
			
			{!! Form::open(array('action' => 'CartController@store')) !!}
				{!! Form::hidden('product_id', $product->id) !!}
				<div class="form-group">
					{!! Form::label('quantity', 'Quantity'); !!}
			    	{!! Form::number('quantity', 1, array('class' => 'form-control', 'placeholder'=>'1')); !!}
				</div>
			{!! Form::submit('Add to cart', array('class'=>'btn btn-primary')); !!}
			{!! Form::close() !!}

        </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>{!! $product->description !!}</p>
		</div>
	</div>

	<hr>
	<div class="pull-right">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
	</div>
	<h2>Customer reviews</h2>

	<div class="review well well-sm">
		<p><strong>Jim Duncan</strong> October 20, 2015 
			<span class="pull-right"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
		</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quos veritatis sequi consequatur soluta nobis laudantium totam, eos vero eveniet quas similique, doloribus vitae inventore nostrum. Atque, architecto tempore blanditiis.</p>
	</div>

	<div class="review well well-sm">
		<p><strong>Sabrina Squires</strong> October 25, 2015 
			<span class="pull-right"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span>
		</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex quos veritatis sequi consequatur soluta nobis laudantium totam, eos vero eveniet quas similique, doloribus vitae inventore nostrum. Atque, architecto tempore blanditiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium inventore rem molestiae.</p>
	</div>
	
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
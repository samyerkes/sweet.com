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
			
			{!! Form::open(array('action' => 'OrderController@store')) !!}
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
	<h2>Customer reviews</h2>
	<span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
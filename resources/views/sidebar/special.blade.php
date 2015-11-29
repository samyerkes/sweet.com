<div class="panel panel-default">
    <div class="panel-heading">Categories</div>
    <ul class="list-group">
    	<li class="list-group-item"><a href="{{ route('product.listing') }}">All products</a></li>
        @foreach($categories as $c)
	  		<li class="list-group-item"><a href="{{ route('product.listing', $c->id) }}">{{ $c->name }}</a></li>
	  	@endforeach
    </ul>
</div>

<h2>Weekly Special</h2>

@foreach($specialProduct as $p)
<div class="thumbnail">
  <a href="{{ route('product.item', $p->id)}}">
	   <img src="/uploads/images/products/product-{{ $p->id }}.jpg" alt="{{ $p->name }}">
  </a>
	<div class="caption">
		<h3>{{ $p->name }} <span class="label label-primary">${{ $p->price }}</span></h3>
    {!! Form::open(array('action' => 'CartController@store')) !!}
      {!! Form::hidden('product_id', $p->id) !!}
      <div class="form-group">
        {!! Form::label('quantity', 'Quantity'); !!}
        {!! Form::number('quantity', 1, array('class' => 'form-control', 'placeholder'=>'1')); !!}
      </div>
    {!! Form::submit('Add to cart', array('class'=>'btn btn-primary')); !!}
    {!! Form::close() !!}
	</div>
</div>
@endforeach

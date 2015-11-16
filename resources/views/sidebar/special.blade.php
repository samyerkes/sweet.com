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
    				
<div class="thumbnail">
	<img src="http://naturalrevolution.org/wp-content/uploads/2015/02/chocolate.jpg" alt="Swiss Chocolate">
	<div class="caption">
		<h3>Swiss Chocolate</h3>
		<p><a href="#" class="btn btn-primary" role="button">Add to cart</a>
	</div>
</div>
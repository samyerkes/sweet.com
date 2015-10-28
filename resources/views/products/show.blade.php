@extends('base')

@section('content')
	@if ($product->inventory < 5)
		<div class="panel panel-warning">
	@else
		<div class="panel panel-success">
	@endif
		<div class="panel-heading">
			{{ $product->name }} <a href="{{ route('admin.products.edit', array('id' => $product->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
		</div>
		<div class="panel-body">
			<strong>Price:</strong> ${{ $product->price }} per unit<br />
			<p>{!! $product->description !!}</p>
	    </div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			Sales of {{ $product->name }} this week
		</div>
		<div class="panel-body">
			<img src="http://www.mathgoodies.com/lessons/graphs/images/construct_line_incorrect.jpg" alt="" class="img-responsive">
		</div>
	</div>
@endsection
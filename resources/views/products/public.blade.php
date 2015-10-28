@extends('base')

@section('content')
    <h1>Products</h1>

    <div class="row">
    @foreach ($products as $product)
            <div class="col-xs-6 col-md-3">
                <a href="{{ route('product.item', array('id' => $product->id)) }}" class="thumbnail">
                    <img src="/uploads/images/products/product-{{$product->id}}.jpg" alt="{{ $product->name }}">
                </a>
                {{ $product->name }}
            </div>
    @endforeach
    </div>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
@extends('base')
@section('content')
    <div class="jumbotron">
    	<h2>Opps, we could not find the page you were looking for.</h2>
    	<p>
    	  <a href="{{ route('home') }}">Home</a>
    	</p>
    </div>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection

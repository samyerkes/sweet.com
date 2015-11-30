<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sweet Sweet Chocolates</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        @yield('styles')
    </head>
    <body>
    	<nav class="navbar navbar-default">
    		<div class="container">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="/">Sweet Sweet Chocolates</a>
    			</div>

    			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav">
    					<li><a href="{{ route('product.listing') }}">Products</a></li>
              <li><a href="{{ route('hours.publicIndex') }}">Store Hours</a></li>
              @foreach ($pages as $p)
                <li><a href="/{{ $p->slug }}">{{ $p->name }}</a></li>
              @endforeach
    					@if (Auth::check())
                            <li><a href="{{ route('profile.index') }}">Profile</a></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        @else
    						<li><a href="{{ route('auth.login') }}">Login</a></li>
    					@endif
    					<li>
                            <a href="{{ route('cart.index') }}">
                                <span class="glyphicon glyphicon-shopping-cart hidden-xs" aria-hidden="true"></span> <span class="hidden-lg hidden-md hidden-sm">Shopping Cart</span>
                                @if(!empty($cartItems))
                                    <span class="label label-default">{{ $cartItems }}</span>
                                @endif
                            </a>
                        </li>
                        @if (Auth::check())
                            @if ($currentUser->role->id < 3)
                                <li><a href="{{ route('admin') }}"><span class="glyphicon glyphicon-cog hidden-xs" aria-hidden="true"></span> <span class="hidden-lg hidden-md hidden-sm">Employee Dashboard</span></a></li>
                            @endif
                        @endif
    				</ul>
    			</div>
    		</div>
    	</nav>

    	<div class="container">
    		<div class="row">
    			<div class="col-md-8">

                    @if (!empty(Session::get('status')))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @elseif (!empty(Session::get('danger')))
                        <div class="alert alert-danger">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    @if (count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

    				@yield('content')
    			</div>
    			<div class="col-md-4">
                    @yield('sidebar')
    			</div>
    		</div>
    	</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @yield('scripts')

    </body>
</html>

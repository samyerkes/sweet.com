@extends('base')

@section('content')
    <h1>Login</h1>
    <div class="alert alert-warning">
        <p>Don't have a login? You'll need to <a href="{{ route('auth.register') }}">register</a> first!</p>
    </div>
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-success">Login</button>
    </div>
</form>
@endsection
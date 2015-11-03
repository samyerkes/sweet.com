@extends('base')

@section('content')
    <h1>Register</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="{{ old('first name') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="{{ old('first name') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-success">Register</button>
    </div>
</form>
@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
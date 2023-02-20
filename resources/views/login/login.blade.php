@extends('layout/layout')
@section('content')
<form action="/login" method="post" class="create-form">
    <h3>Login</h3>
    @csrf
    @method('post')
    <div class="create-group">
        <label for="email">Email</label>
        @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
        @endif
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="create-group">
        <label for="password">Password</label>
        @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
        @endif
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn-full btn-add">Login</button>
</form>
@endsection

@extends('layout.layout')
@section('content')
    <form action="/users/store" method="post" class="create-form">
        <h3>Add User</h3>
        @csrf
        @method('post')
        <div class="create-group">
            <label for="name">Name</label>
            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="create-group">
            <label for="email">Email</label>
            @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="create-group">
            <label for="password">Password:</label>
            @if($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="create-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-full btn-add">Save</button>
    </form>
@endsection

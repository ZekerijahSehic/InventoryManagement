@extends('layout/layout')
@section('content')
<form action="/users/{{$user->id}}" method="post" class="create-form">
    @csrf
    @method("PUT")
    <div class="create-group">
        <label for="name">Name</label>
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
        <input type="text" id="name" name="name" value="{{ $user->name }}">
    </div>
    <div class="create-group">
        <label for="email">Email</label>
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
        <input type="email" id="email" name="email" value="{{ $user->email }}">
    </div>
    <div class="create-group">
        <label for="role_id">Role</label>
        @if($errors->has('role'))
            <p class="text-danger">{{ $errors->first('role') }}</p>
        @endif
        <select name="role_id" id="role_id" class="form-control">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn-full btn-add">Save</button>
</form>

@endsection



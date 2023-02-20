@extends('layout/layout')
@extends('layout/header')
@section('content')
<div style="width: 80%; margin: 30px auto;">
    <a href="/users/create" class="btn btn-add">Create User</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->first()->name }}</td>
            <td>
                <div class="table-actions">
                    <div>
                        <button class="btn-small btn-edit">
                            <a href="/users/{{$user->id}}/edit">Edit</a>
                        </button>
                    </div>
                    <div>
                        <form action="/users/{{$user->id}}" method="post" style="margin-bottom: 0px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection



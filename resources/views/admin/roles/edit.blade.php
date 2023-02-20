<link rel="stylesheet" href="/app.css">

<form method="POST" action="/roles/{{$role->id}}" class="create-form">
    @csrf
    @method("PUT")
    <div class="create-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
    </div>
    <div class="create-group">
        <label for="permissions">Permissions:</label>
        <div class="checkbox">
            @foreach ($permissions as $permission)
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, $currentPermissions) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </label>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn-small btn-add">Update Role</button>
</form>





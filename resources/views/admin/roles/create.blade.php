<link rel="stylesheet" href="/app.css">
<form action="/roles/store" method="post">
@csrf
@method('post')
<div class="form-group">
    <label for="name">Role Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
</div>
    <div class="form-group">
        <label>Permissions</label><br>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
            <label>{{ $permission->name }}</label><br>
        @endforeach
    </div>
<button type="submit" class="btn-height btn btn-add">Save</button>
</form>

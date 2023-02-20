<link rel="stylesheet" href="/app.css">
<form action="/permissions/{{$permission->id }}" method="post">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="name">Permission Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
    </div>
    <button type="submit" class="btn-height btn btn-add">Save</button>
</form>




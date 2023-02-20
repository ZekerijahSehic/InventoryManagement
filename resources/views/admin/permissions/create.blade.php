<link rel="stylesheet" href="/app.css">
<form action="/permissions/store" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Permission Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn-height btn btn-add">Save</button>
</form>

<link rel="stylesheet" href="/app.css">
<button class="btn-height btn btn-add">
    <a href="/permissions/create"> CREATE </a>
</button>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>
                <div class="table-actions">
                    <div>
                        <button class="btn-small btn-edit">
                            <a href="/permissions/{{$permission->id}}/edit">Edit</a>
                        </button>
                    </div>
                    <div>
                        <form action="/permissions/{{$permission->id}}" method="post" style="display: inline-block">
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


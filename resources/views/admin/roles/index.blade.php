<link rel="stylesheet" href="/app.css">
<button class="btn-height btn btn-add">
    <a href="/roles/create"> CREATE </a>
</button>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Permission</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>@foreach ($role->permissions as $permission)
                    {{ $permission->name }}
                @endforeach</td>
            <td>
                <div class="table-actions">
                    <div>
                        <button class="btn-small btn-edit">
                            <a href="/roles/{{$role->id}}/edit" >Edit</a>
                        </button>
                    </div>
                    <div>
                        <form action="/roles/{{$role->id}}" method="post" >
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


<?php

namespace App\Repositories;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository {

    protected $model;

    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function getAll() : Collection {
        return $this->fetchAll();
    }

    public function find(int $id) : User {
        return $this->findById($id);
    }

    public function createUser(array $data) : User {
        $roleId = $data['role_id'];
        $user = $this->create($data);
        $user->roles()->attach($roleId);
        return $user;
    }

    public function updateUser(int $id, UpdateUserRequest $request) : User {
        $user = $this->update($request->all(), $id);
        $role = Role::where('id', $request['role_id'])->first();
        $user->refreshRole($role);
        return $user;
    }

    public function deleteUser(int $id) : bool {
        return $this->delete($id);
    }
}

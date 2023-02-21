<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class UserRepository extends BaseRepository
{

    protected $model;
    public function __construct(User $model){
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function find(int $id)
    {
        return $this->findById($id);
    }

    public function createUser($data) : User
    {
        $roleId = $data['role_id'];
        $user = $this->create($data);
        $user->roles()->attach($roleId);
        return $user;
    }

    public function updateUser(int $id, $request)
    {
        $user = $this->update($request->all(), $id);
        $role = Role::where('id', $request['role_id'])->first();
        $user->refreshRole($role);
        return $user;
    }

    public function deleteUser(int $id)
    {
        return $this->delete($id);
    }
}

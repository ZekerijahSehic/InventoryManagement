<?php

namespace App\Repositories;
use App\Models\Role;

class RoleRepository extends BaseRepository
{

    protected $model;

    public function __construct(Role $model){
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

    public function createRole($data)
    {
        $role = new Role($data);
        $role->save();
        $permissionIds = $data['permissions'];
        $role->permissions()->attach($permissionIds);
        return $role;
    }

    public function updateRole(int $id, $request)
    {
        $role = $this->find($id);
        $role->update($request->all());
        $permissions = $request->input('permissions', []);

        $role->permissions()->whereNotIn('id', $permissions)->detach();

        foreach ($permissions as $permissionId) {
            if (!$role->permissions->contains($permissionId)) {
                $role->permissions()->attach($permissionId);
            }
        }

        return $role;
    }

    public function deleteRole(int $id)
    {
        return $this->delete($id);
    }
}





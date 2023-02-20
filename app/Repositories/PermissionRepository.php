<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends BaseRepository
{

    protected $model;

    public function __construct(Permission $model){
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

    public function createPermission($data)
    {
        return $this->create($data);
    }

    public function updatePermission(int $id, $request)
    {
        return $this->update($request->all(), $id);
    }

    public function deletePermission(int $id)
    {
        return $this->delete($id);
    }

}

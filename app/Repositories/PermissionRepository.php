<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PermissionRepository extends BaseRepository {

    protected $model;

    public function __construct(Permission $model) {
        parent::__construct($model);
    }

    public function getAll() : Collection {
        return $this->fetchAll();
    }

    public function find(int $id) : Permission {
        return $this->findById($id);
    }

    public function createPermission(array $data) : Permission {
        return $this->create($data);
    }

    public function updatePermission(int $id, Request $request) : Permission {
        return $this->update($request->all(), $id);
    }

    public function deletePermission(int $id) : bool {
        return $this->delete($id);
    }
}

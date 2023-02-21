<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository {

    protected $model;

    public function __construct(Product $model) {
        parent::__construct($model);
    }

    public function getAll() : Collection {
        return $this->fetchAll();
    }

    public function find(int $id) : Product {
        return $this->findById($id);
    }

    public function createProduct(array $data) : Product {
        return $this->create($data);
    }

    public function updateProduct(int $id, Request $request) : Product {
        return $this->update($request->all(), $id);
    }

    public function deleteProduct(int $id) : bool {
        return $this->delete($id);
    }
}

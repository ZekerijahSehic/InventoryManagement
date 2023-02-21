<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository {

    protected $model;

    public function __construct(Product $model) {
        parent::__construct($model);
    }

    public function getAll() {
        return $this->fetchAll();
    }

    public function find(int $id) {
        return $this->findById($id);
    }

    public function createProduct($data) {
        return $this->create($data);
    }

    public function updateProduct(int $id, $request) {
        return $this->update($request->all(), $id);
    }

    public function deleteProduct(int $id) {
        return $this->delete($id);
    }
}

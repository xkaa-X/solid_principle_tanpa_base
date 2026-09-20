<?php

namespace App\Services\Product;

use App\Contracts\Product\ProductRepositoryInterface;

class ProductService
{
    protected ProductRepositoryInterface $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts() {
        return $this->productRepo->getAll();
    }

    public function getProductById(int $id) {
        return $this->productRepo->findById($id);
    }

    public function createProduct(array $data) {
        return $this->productRepo->create($data);
    }

    public function updateProduct(int $id, array $data) {
        return $this->productRepo->update($id, $data);
    }

    public function deleteProduct(int $id): bool {
        return $this->productRepo->delete($id);
    }
}
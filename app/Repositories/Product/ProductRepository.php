<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Contracts\Product\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection {
        return Product::all();
    }

    public function findById(int $id): ?Model {
        return Product::findOrFail($id);
    }

    public function create(array $data): ?Model {
        return Product::create($data);
    }

    public function update(int $id, array $data): ?Model {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool {
        $product = Product::findOrFail($id);
        return (bool) $product->delete();
    }
}
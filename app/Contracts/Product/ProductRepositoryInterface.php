<?php

namespace App\Contracts\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id): ?Model;
    public function create(array $data): ?Model;
    public function update(int $id, array $data): ?Model;
    public function delete(int $id): bool;
}
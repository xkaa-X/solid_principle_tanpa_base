<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'nama_kategori' => $this->nama_kategori,
        ];
    }
}
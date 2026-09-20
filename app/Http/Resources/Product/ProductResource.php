<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'stok' => (int) $this->stok,
            'status' => $this->status,
            'created_at' => $this->created_at?->toDateTimeString()
        ];
    }
}
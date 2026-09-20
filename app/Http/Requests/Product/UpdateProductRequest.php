<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool {return true;}

    public function rules(): array {
        return [
            'nama_produk' => 'sometimes|string|max:255',
            'harga' => 'sometimes|numeric|min:0',
            'stok' => 'sometimes|integer|min:0',
            'status' => 'sometimes|in:active,deactive'
        ];
    }
}
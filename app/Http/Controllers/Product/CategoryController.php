<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreCategoryRequest;
use App\Http\Resources\Product\CategoryResource;
use App\Traits\ApiResponseTrait;
use Exception;

class CategoryController extends Controller
{
    //
    use ApiResponseTrait;

    public function index() {
        try {
            $categories = Category::all();
            return $this->successResponse(CategoryResource::collection($categories));
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal mengambil kategori');
        }
    }

    public function store(StoreCategoryRequest $request) {
        try {
            $category = Category::create($request->validated());
            return $this->successResponse(new CategoryResource($category), 'kategori berhasil di tambahkan'); 
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal membuat kategori', 400);
        }
    }
}

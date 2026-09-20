<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Traits\ApiResponseTrait;
use Exception;

class ProductController extends Controller
{
    //
    use ApiResponseTrait;

    protected ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index() {
        try {
            $product = $this->productService->getAllProducts();
            return $this->successResponse(ProductResource::collection($product));
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal mengambil produk');
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            $product = $this->productService->createProduct($request->validated());
            return $this->successResponse(new ProductResource($product), 'produk berhasil di buat', 201);
        } catch(Exception $e) {
            return $this->errorResponse($e, 'gagal membuat produk', 400);
        }
    }

    public function show(int $id) {
        try {
            $product = $this->productService->getProductById($id);
            return $this->successResponse(new ProductResource($product));
        } catch (Exception $e) {
            return $this->errorResponse($e, 'produk tidak di temukan', 404);
        }
    }

    public function update(UpdateProductRequest $request, int $id) {
        try {
            $product = $this->productService->updateProduct($id, $request->validated());
            return $this->successResponse(new ProductResource($product), 'produk berhasil di update', 200);
        } catch(Exception $e) {
            return $this->errorResponse($e, 'produk gagal di update', 400);
        }
    }

    public function destroy(int $id) {
        try {
            $this->productService->deleteProduct($id);
            return $this->successResponse(null, 'produk berhasil di hapus');
        } catch(Exception $e) {
            return $this->errorResponse($e, 'produk gagal di hapus', 400);
        }
    }
}

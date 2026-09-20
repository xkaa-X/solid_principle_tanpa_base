<?php

namespace App\Traits;
use Exception;

trait ApiResponseTrait
{
    public function successResponse($data = null, string $message = 'Success', int $code = 200) {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse(Exception $exception, string $message = 'Error', int $code = 500) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $exception->getMessage()
        ], $code);
    }
}
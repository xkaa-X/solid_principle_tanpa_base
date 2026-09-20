<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use ApiResponseTrait;

    protected UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(RegisterUserRequest $request) {
        try {
            $data = $this->userService->register($request->all());
            return $this->successResponse($data, 'berhasil registrasi', 201);
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal register', 500);
        }
    }

    public function login(LoginUserRequest $request) {
        try {
            $data = $this->userService->login($request->validated());
            
            return $this->successResponse([
                'user' => new UserResource($data['user']),
                'token' => $data['token']
            ], 'register berhasil');
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal login', 401);
        }
    }

    public function profile(Request $request) {
        return $this->successResponse(new UserResource($request->user()), 'data profil di dapatkan');
    }
}

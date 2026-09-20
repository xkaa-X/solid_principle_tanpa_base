<?php

namespace App\Services\User;

use App\Contracts\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserService
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function register(array $data): array {
        $user = $this->userRepo->create($data);
        $token = $user->createToken('OAuth2PassportToken')->accessToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $credentials): array {
        $user = $this->userRepo->findByEmail($credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new Exception('email dan password salah');
        }

        $token = $user->createToken('OAuth2PassportToken')->accessToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
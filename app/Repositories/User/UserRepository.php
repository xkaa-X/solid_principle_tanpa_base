<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Contracts\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): ?Model {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function findByEmail(string $email): ?Model {
        return User::where('email', $email)->first();
    }
}
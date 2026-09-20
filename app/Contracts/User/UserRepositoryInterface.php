<?php

namespace App\Contracts\User;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function create(array $data): ?Model;
    public function findByEmail(string $email): ?Model;
}
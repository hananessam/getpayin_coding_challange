<?php

namespace App\Repositories\Auth\Interfaces;

use App\Models\User;

interface AuthInterface
{
    public function register(array $data): User;
    public function login(array $credentials);
    public function logout();
}

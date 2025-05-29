<?php

namespace App\Repositories\Auth\Interfaces;

interface AuthInterface
{
    public function register(array $data);
    public function login(array $credentials);
    public function logout();
}

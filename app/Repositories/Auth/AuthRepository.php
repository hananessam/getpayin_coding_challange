<?php

namespace App\Repositories\Auth;
use App\Models\User;
use App\Repositories\Auth\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface
{
    /**
     * Create a new AuthRepository instance.
     */
    public function __construct(public User $user)
    {
    }

    public function register(array $data)
    {
        // Implement registration logic
    }

    public function login(array $credentials)
    {
        // Implement login logic
    }

    public function logout()
    {
        // Implement logout logic
    }
}

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

    public function register(array $data): User
    {
        return $this->user->create($data);
    }

    public function login(array $credentials): ?User
    {
        $user = $this->user->where('email', $credentials['email'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            return $user;
        }

        return null;
    }

    public function logout(): bool
    {
        return auth()->user()->tokens()->delete();
    }
}

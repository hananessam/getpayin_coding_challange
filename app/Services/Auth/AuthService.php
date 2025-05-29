<?php

namespace App\Services\Auth;

use App\Http\Resources\Api\UserResource;
use App\Repositories\Auth\Interfaces\AuthInterface;

class AuthService
{
    /**
     * Create a new AuthService instance.
     */
    public function __construct(public AuthInterface $authRepository)
    {
    }

    public function register(array $data)
    {
        $user = $this->authRepository->register($data);
        return [
            'user' => UserResource::make($user),
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];
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
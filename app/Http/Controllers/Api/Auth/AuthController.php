<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     */
    public function __construct(public AuthService $authService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->authService->register($request->validated());
        return response()->json($data, 201);
    }

    public function login(LoginRequest $request)
    {
        $data = $this->authService->login($request->validated());

        if (!$data) {
            return response()->json(['message' => __('auth.failed')], 401);
        }

        return response()->json($data, 200);
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json(['message' => __('auth.logout')], 200);
    }
}

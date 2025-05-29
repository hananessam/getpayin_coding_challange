<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\RegisterRequest;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Create a new RegisterController instance.
     */
    public function __construct(public AuthService $authService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->authService->register($request->validated());
        return response()->json($data, 201);
    }
}

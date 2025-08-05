<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\ApiResponse;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $attempt = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if (!$attempt) {
            return ApiResponse::unauthorized();
        }

        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        return ApiResponse::success([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ]);
    }

    public function logout(AuthRequest $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::success([], 'Logout realizado com sucesso.');
    }
}

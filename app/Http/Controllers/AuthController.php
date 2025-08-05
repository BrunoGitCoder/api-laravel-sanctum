<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

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
            return response()->json([
                'error' => true,
                'message' => 'Credencial inválida.'
            ], 401);
        }

        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'message' => 'Login efetuado com sucesso.',
            'token' => $token
        ], 200);
    }
}

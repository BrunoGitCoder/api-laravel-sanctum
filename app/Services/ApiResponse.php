<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data, string $message = 'Operação realizada com sucesso.', int $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $code);
    }

    public static function error(string $message = 'Ocorreu um erro no servidor.', int $code = 500, $errors = null): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    public static function unauthorized(string $message = 'Não autorizado.'): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        return response()->json($response, 401);
    }
}
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'error' => true,
        'message' => 'Você não tem permissão para acessar esta página.'
    ], 403);
});
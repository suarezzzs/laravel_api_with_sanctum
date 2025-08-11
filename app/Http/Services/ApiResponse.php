<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Resposta para sucesso em requisições GET, PUT, PATCH.
     * Status: 200 OK
     */
    public static function success($data, string $message = "Success"): JsonResponse
    {
        return response()->json([
            "status_code" => 200,
            "message" => $message,
            "data" => $data
        ], 200);
    }

    /**
     * Resposta para sucesso na criação de um recurso.
     * Status: 201 Created
     */
    public static function created($data, string $message = "Resource created successfully"): JsonResponse
    {
        return response()->json([
            "status_code" => 201,
            "message" => $message,
            "data" => $data
        ], 201);
    }

    /**
     * Resposta para recurso não encontrado.
     * Status: 404 Not Found
     */
    public static function notFound(string $message = "Resource not found"): JsonResponse
    {
        return response()->json([
            "status_code" => 404,
            "message" => $message
        ], 404);
    }

    /**
     * Resposta para erros de validação de dados.
     * Status: 422 Unprocessable Entity
     */
    public static function validationError(array $errors, string $message = "Validation failed"): JsonResponse
    {
        return response()->json([
            "status_code" => 422,
            "message" => $message,
            "errors" => $errors
        ], 422);
    }

    /**
     * Resposta para acesso não autorizado.
     * Status: 401 Unauthorized
     */
    public static function unauthorized(string $message = "Unauthorized access"): JsonResponse
    {
        return response()->json([
            "status_code" => 401,
            "message" => $message
        ], 401);
    }

    /**
     * Resposta para erros internos e inesperados do servidor.
     * Status: 500 Internal Server Error
     */
    public static function serverError(string $message = "Internal Server Error"): JsonResponse
    {
        return response()->json([
            "status_code" => 500,
            "message" => $message
        ], 500);
    }
}
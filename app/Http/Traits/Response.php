<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

trait Response
{
    public static function successResponse(string $message, mixed $data = null, ...$args): JsonResponse
    {
        $response = [
            "status" => "success",
            "code" => HttpResponse::HTTP_OK,
            "message" => $message,
        ];
        if ($data != null) {
            $response["data"] = $data;
        }
        if ($args) {
            foreach ($args as $key => $value) {
                $response[$key] = $value;
            }
        }
        return response()->json($response);
    }

    public static function errorResponse(string $message, int $code = null): JsonResponse
    {
        return response()->json([
            "status" => "error",
            "code" => (isset($code) ? $code : HttpResponse::HTTP_UNPROCESSABLE_ENTITY),
            "message" => $message
        ]);
    }
}

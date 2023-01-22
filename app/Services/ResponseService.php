<?php

namespace App\Services;
use Exception;
use Illuminate\Http\JsonResponse;

class ResponseService extends Service
{
    public static function jsonRes(bool $success, $data, $message, $line, $status): \Illuminate\Http\JsonResponse
    {
        try {
            return new JsonResponse([
                'success' => $success,
                'data' => $data,
                'message' => strlen($message) > 1000 ? strval(substr($message, 0, 1000)) : strval($message),
                'line' => $line,
            ], $status);
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }
}
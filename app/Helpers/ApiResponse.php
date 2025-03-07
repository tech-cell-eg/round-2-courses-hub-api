<?php

namespace App\Helpers;

class ApiResponse
{
    static function sendResponse($code = 201, $message = null, $data = null)
    {
        $response = [
            'status' => $code,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response, $code);
    }
}

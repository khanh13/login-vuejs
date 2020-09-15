<?php

namespace App\Helpers;

class ResponseHelper
{
    public function successResponse($success, $message, $data)
    {
        return response()->json([
            'data' => [
                'status' => $success,
                'message' => $message,
                'data' => $data,
            ]
        ]);
    }

    public function errorResponse($success, $message, $errorCode)
    {
        return response()->json([
            'data' => [
                'error' => [
                    'status' => $success,
                    'message' => $message
                ]
            ]
        ], $errorCode);
    }
}

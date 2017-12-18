<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code = 500)
    {
        return response()->json($message, $code);
    }
}
<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse;

    protected function error($message = "", $error_code = 500, $e = null)
    {
        return [
            'error' => true,
            'error_code' => $error_code,
            'exception' => $e,
            'message' => $message
        ];
    }

    protected function parserError($result, $successCode = 200)
    {
        if (isset($result['error']) && $result['error'] == true) {
            return $this->errorResponse($result, $result['error_code']);
        }

        return $this->successResponse($result, $successCode);
    }
}

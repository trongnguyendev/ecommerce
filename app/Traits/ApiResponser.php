<?php

namespace App\Traits;

trait ApiResponser
{
    private function successResponse($data, $message = '', $code = 200)
    {
        return response()->json(['message' => $message, 'data' => $data, 'code' => $code]);
    }

    protected function errorResponse($message, $code = 400)
    {
        return response()->json(['error' => $message, 'code' => $code]);
    }

}
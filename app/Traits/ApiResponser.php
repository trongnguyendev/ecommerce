<?php

namespace App\Traits;

trait ApiResponser
{
    private function successResponse($data, $message = '', $code = 200)
    {
        return response()->json([
            'success'   => true,
            'data'      => $data,
            'message'   => $message,
            'code'      => $code,
        ]);
    }

    protected function errorResponse($message, $code = 400)
    {
        return response()->json([
            'success'   => false,
            'code' => $code,
            'error'     => [
                'code'  => $code,
                'message'   => $message
            ],
            
        ]);
    }

}
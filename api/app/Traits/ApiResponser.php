<?php

namespace App\Traits;

trait ApiResponser
{
    protected function successResponse($data, $message = '', $code = 200)
    {
        $format_json = array_merge(['success' => true], $data);

        return response()->json($format_json);
    }

    protected function errorResponse($message, $code = 400)
    {
        return response()->json([
            'success'   => false,
            'error'     => [
                'code'  => $code,
                'message'   => $message
            ],
        ]);
    }

}
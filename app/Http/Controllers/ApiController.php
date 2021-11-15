<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function response_message($message, $type)
    {
        if($type === 1) {
            $get_message = config('ecommerce.response_message_success');
        }

        if($type === 0) {
            $get_message = config('ecommerce.response_message_error');
        }
        
        if(empty($message)) {
            return false;
        }

        return $get_message[$message];
    }

    // public function response_code($code)
    // {
    //     $_get_code = config('ecommerce.response_code');

    //     if(empty($code)) {
    //         return false;
    //     }

    //     return $_get_code[$code];
    // }
}
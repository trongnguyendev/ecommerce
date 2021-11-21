<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;

    public function get_message($message, $type)
    {
        if($type) {
            $get_message = config('ecommerce.response_success');
        }

        if(!$type) {
            $get_message = config('ecommerce.response_error');
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
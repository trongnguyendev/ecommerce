<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;

    protected $_response_message;
    protected $_response_code;

    public function __construct()
    {
        // $this->middleware('auth:api');
        $this->_response_message = config('ecommerce.response_message');
        $this->_response_code = config('ecommerce.response_code');
    }

    public function response_message($message)
    {
        $_get_message = $this->_response_mesage;

        if(empty($message)) {
            return false;
        }

        return $_get_message[$message];
    }

    public function response_code($code)
    {
        $_get_code = $this->_response_code;

        if(empty($code)) {
            return false;
        }

        return $_get_code[$code];
    }
}
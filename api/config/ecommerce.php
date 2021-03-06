<?php

return [
    'response_success' => [
        'category_not_of_product' => 'The specified category is not a category of this product',
        'logout_success'    => 'Logout success.',
    ],

    'response_error' => [
        'id_not_find'       => 'ID not find',
        'login_failed'      => 'Login failed!'
    ],

    'response_code' => [
        'OK'                    => 200,
        'CREATED'               => 201,
        'NO_CONTENT'            => 204,
        'BAD_REQUEST'           => 400,
        'UNAUTHORIZED'          => 401,
        'FORBIDDEN'             => 403,
        'NOT_FOUND'             => 404,
        'METHOD_NOT_ALLOWED'    => 405,
        'NOT_ACCEPTABLE'        => 406,
        'CONFLICT'              => 409,
        'UNSUPPORTED_MEDIA_TYPE'=> 415,
        'INTERAL_SERVER_ERROR'  => 500           
    ],  
];
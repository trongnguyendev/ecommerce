<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use App\Traits\ApiResponser;

class AuthController extends ApiController
{

    use ApiResponser;

    public function login(Request $request)
    {
        
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name'  => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $user = User::create([
            'name'      => $credentials['name'],
            'email'     => $credentials['email'],
            'password'  => bcrypt($credentials['password'])
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        $response = [
            'data'      => $user,
            'token'     => $token
        ];

        $message = $this->response_message('category_not_of_product', 1);

        return $this->successResponse($response, $message);
    }

}

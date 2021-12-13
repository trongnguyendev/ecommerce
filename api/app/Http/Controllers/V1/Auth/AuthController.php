<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use App\Repositories\AuthRepository;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends ApiController
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        // Check email
        $user = $this->authRepository->findBy('email', $data['email']);

        // Check password
        if(!$user || !Hash::check($data['password'], $user->password))
        {
            $message = $this->get_message('login_failed', false);
            return $this->errorResponse($message);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        $response = [
            'users'      => $user,
            'token'     => $token
        ];

        return $this->successResponse($response);

    }

    public function register(AuthRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->authRepository->create([
            'name'      => $credentials['name'],
            'email'     => $credentials['email'],
            'password'  => bcrypt($credentials['password'])
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        $response = [
            'users'      => $user,
            'token'     => $token
        ];

        return $this->successResponse($response);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->successResponse(array());
    }

    public function refreshAccessToken()
    {
        auth()->user()->currentAccessToken()->delete();

        $newToken = auth()->user()->createToken('auth-token')->plainTextToken;

        $response = [
            'refresh token'     => $newToken
        ];

        return $this->successResponse($response);
    }

    public function user(Request $request)
    {
        $response = [
            'user'     => $request->user()
        ];

        return $this->successResponse($response);
    }

}

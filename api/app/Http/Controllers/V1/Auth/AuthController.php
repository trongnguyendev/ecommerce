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
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->authRepository = $authRepository;
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $response = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

        return $this->successResponse($response);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

        // Check email
        // $user = $this->authRepository->findBy('email', $data['email']);

        // Check password
        // if(!$user || !Hash::check($data['password'], $user->password))
        // {
        //     $message = $this->get_message('login_failed', false);
        //     return $this->errorResponse($message);
        // }

        // $token = $user->createToken('auth-token')->plainTextToken;

        // $response = [
        //     'users'      => $user,
        //     'token'     => $token
        // ];

        // return $this->successResponse($response);

    }

    public function register(AuthRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->authRepository->create([
            'name'      => $credentials['name'],
            'email'     => $credentials['email'],
            'password'  => bcrypt($credentials['password'])
        ]);

        $token = auth()->attempt($credentials);

        $response = [
            'users'      => $user,
            'token'     => $token
        ];

        return $this->successResponse($response);
    }

    public function logout()
    {
        auth()->logout();

        return $this->successResponse(['message' => 'Successfully logged out']);
    }

    public function refreshAccessToken()
    {
        $newToken = auth()->refresh();

        $response = [
            'refresh token'     => $newToken
        ];

        return $this->successResponse($response);
    }

    public function user()
    {
        $response = [
            'user'     => auth()->user()
        ];

        return $this->successResponse($response);
    }

}

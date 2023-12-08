<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->get('remember_me'))){
            $user = auth()->user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user]);
        }

        return response()->json(
            [
                'errors' => [
                    'password' => 'The email address or password is incorrect.'
                ],
            ], 401);
    }
}

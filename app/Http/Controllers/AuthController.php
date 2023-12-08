<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $isAuth = Auth::attempt($request->only(['email', 'password'], $request->remember_me));

        if ($isAuth)
        {
            return response()->json(['user' => Auth::user()]);
        }

        return response()->json(
            [
                'errors' => [
                    'password' => 'The email address or password is incorrect.'
                ],
            ], 401);
    }
}

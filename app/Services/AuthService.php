<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    public function login($data): JsonResponse
    {
        $credentials = request()->only(['email', 'password']);
        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ], Response::HTTP_OK);
    }

    public function register($data): JsonResponse
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        $token = auth()->login($user);

        return response()->json([
            'success' => true,
                'token' => $token,
        ], Response::HTTP_CREATED);
    }
}

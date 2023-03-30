<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    )
    {
    }

    /**
     * @OA\Post(
     * path="/api/login",
     * operationId="Login",
     * tags={"Login"},
     * summary="User Login",
     * description="User Login here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", format="string", example="email@test.com"),
     *             @OA\Property(property="password", type="string", format="string", example="test123"),
     *     ),
     *            @OA\Schema(
     *               type="object",
     *               required={"name","email", "password", "password_confirmation"},
     *               @OA\Property(property="email", type="text"),
     *               @OA\Property(property="password", type="password"),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="boolean", example=true),
     *              @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGliZXJmbHkudGVzdC9hcGkvbG9naW4iLCJpYXQiOjE2ODAxMjk2ODUsImV4cCI6MTY4MDEzMzI4NSwibmJmIjoxNjgwMTI5Njg1LCJqdGkiOiJjUlZEdzE5U2hRaGRBdXFUIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.GIb7U9y-SbSZK5pebMgVAGulIWo_7U6sUppshrAh6rY"),
     *          )
     *       ),
     * )
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->authService->login($request);
    }

    /**
     * @OA\Post(
     * path="/api/register",
     * operationId="Register",
     * tags={"Register"},
     * summary="User Register",
     * description="User Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", format="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="string", example="email@test.com"),
     *             @OA\Property(property="password", type="string", format="string", example="test123"),
     *     ),
     *            @OA\Schema(
     *               type="object",
     *               required={"name","email", "password", "password_confirmation"},
     *               @OA\Property(property="email", type="text"),
     *               @OA\Property(property="password", type="password"),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="boolean", example=true),
     *              @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGliZXJmbHkudGVzdC9hcGkvbG9naW4iLCJpYXQiOjE2ODAxMjk2ODUsImV4cCI6MTY4MDEzMzI4NSwibmJmIjoxNjgwMTI5Njg1LCJqdGkiOiJjUlZEdzE5U2hRaGRBdXFUIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.GIb7U9y-SbSZK5pebMgVAGulIWo_7U6sUppshrAh6rY"),
     *          )
     *       ),
     * )
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->authService->register($request);
    }
}

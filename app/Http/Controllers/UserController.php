<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/users",
     *    operationId="all",
     *    tags={"Users"},
     *    summary="User authenticated can get a list of all users",
     *    description="User authenticated can get a list of all users",
     *     @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="users",type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="name", type="integer", example="John Doe"),
     *                  @OA\Property(property="email", type="string", example="email@test.com"),
     *                  @OA\Property(property="verified_at", type="null", example=null),
     *                  @OA\Property(property="created_at", type="string", example="2023-03-29T22:29:23.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2023-03-29T22:29:23.000000Z"),
     *             )
     *          )
     *       )
     *  )
     */
    public function all(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'users' => $users,
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *    path="/api/users/{id}",
     *    operationId="find",
     *    tags={"Users"},
     *    summary="User authenticated can get a determinated user",
     *    description="User authenticated can get a determinated user",
     *     @OA\Parameter(name="id", in="path", description="Id of User", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *          response=200, description="OK",
     *          @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="users",type="object",
     *                  @OA\Property(property="id", type="integer", example=4),
     *                  @OA\Property(property="name", type="integer", example="John Doe"),
     *                  @OA\Property(property="email", type="string", example="johndoe@test.com"),
     *                  @OA\Property(property="verified_at", type="null", example=null),
     *                  @OA\Property(property="created_at", type="string", example="2023-03-29T22:29:23.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2023-03-29T22:29:23.000000Z"),
     *             )
     *          )
     *       )
     *  )
     */
    public function find(string $id): JsonResponse
    {
        $user = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'user' => $user,
        ], Response::HTTP_OK);
    }
}

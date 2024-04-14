<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="user",
 *     description="User related operations"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"user"},
     *     path="/api/users",
     *     summary="Returns a list of users",
     *     description="Returns a list of users",
     *     @OA\Response(response="200", description="A list with users"),
     *      @OA\Response(
     *          response="400",
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Forbidden"
     *      )
     * ),
     *
     */
    public function index(Request $request)
    {
        $users = User::all();
        return $users;
    }
}

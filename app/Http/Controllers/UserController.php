<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function login(Request $request): JsonResponse
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return response()->json([
                'email' => $user->email,
                'token' => $success['token'],
                'status' => 'Success'
            ]);
        } else {
            return response()->json( ['error' => 'Unauthorised']);
        }
    }

    public function profile(Request $request): JsonResponse
    {
        return response()->json(User::find(auth('sanctum')->user()->id));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        if (! Gate::allows('can-view', User::find(auth('sanctum')->user()->id))) {
            abort(403);
        }
        return response()->json(User::find(auth('sanctum')->user()->id));
    }

    public function editPage(Request $request): JsonResponse
    {
        if (! Gate::allows('can-edit', User::find(auth('sanctum')->user()->id))) {
            //print_r(User::find(auth('sanctum')->user()->id));
            abort(403);
        }
        return response()->json(User::find(auth('sanctum')->user()->id));
    }

    public function deletePage(Request $request): JsonResponse
    {
        if (! Gate::allows('can-delete', User::find(auth('sanctum')->user()->id))) {
            abort(403);
        }
        return response()->json(User::find(auth('sanctum')->user()->id));
    }


    public function memberships(Request $request): JsonResponse
    {
        $memberships = User::find(auth('sanctum')->user()->id)->memberships;
        return response()->json($memberships[0]);
    }
}

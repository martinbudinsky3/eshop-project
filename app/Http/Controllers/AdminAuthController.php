<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->input())) {
            return response()->json([
                'message' => 'Incorrect credentials'
            ], 401);
        }

        if (!auth()->user()->isAdmin()) {
            return response()->json([
                'message' => 'You must have an admin rights to log in'
            ], 403);
        }

        return response()->json([
            'api_token' => auth()->user()->createToken('API Token')->plainTextToken
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}

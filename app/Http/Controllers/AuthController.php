<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->input())) {
            return response()->json([
                'message' => 'Incorrect credentials'
            ], 401);
        }

        return response()->json(null, 204);
    }

    public function logout(Request $request)
    {
        session()->flush();

        return response()->json(null, 204);
    }
}

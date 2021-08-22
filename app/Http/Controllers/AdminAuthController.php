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

        $request->session()->regenerate();

        return response()->json(null, 204);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(null, 204);
    }
}

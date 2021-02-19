<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function changePhone(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'between:10,16'],
        ]);
   
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->save();
        
        session()->flash('success', 'Telefónne číslo bolo úspešne zmenené');

        return redirect('/profile/settings');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
   
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        session()->flash('success', 'Heslo bolo úspešne zmenené');

        return redirect('/profile/settings');
    }
}

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
        /*$request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        session()->flash('Heslo bolo úspešne zmenené');*/

        return redirect('/profile/info');
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

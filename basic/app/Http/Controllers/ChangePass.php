<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function chPassword()
    {
        return view('admin.body.change_password');
    }
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','password is changed successfully');
        }
        else{
            return redirect()->back()->with('error',' current password is invalid');
        }
    }
}

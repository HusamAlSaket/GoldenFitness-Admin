<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function showProfile(){
        $user =auth::user();
        return view('users.profile.index',compact('user'));
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            
        ]);

        $user =Auth::user();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->save();

        return back()->with('success',',Profile updated successfully');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user=Auth::user();
        if(!Hash::check($request->input('current_password'),$user->password)){
            return back()->withErrors(['current_password' =>'Current password is incorrect']);
        }

        $user->password=Hash::make($request->input('password'));
        $user->save();

        return back()->with('success', 'Password Updated Successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // editprofile
    public function editprof(){
        return view('private.edit.editprofile');
    }

    public function updateprof(Request $request){
        $attr = $request->validate([
            'name' => 'required',
            'email' => ['email', 'required', 'unique:users,email,' . auth()->id()],
        ]);

        auth()->user()->update($attr);

        return redirect()->route('home')->with('message','Profile Berhasil diubah');
    }

    // edit password
    public function editpass(){
        return view('private.edit.editpassword');
    }
    public function updatepass(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->update(['password'  => Hash::make($request->password)]);
            return redirect()->route('home')->with('message', 'Password Updated Success');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Password is incorrect'
        ]);
    }
}

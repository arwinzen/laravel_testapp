<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->validate([
               'email' => ['required', 'email'],
               'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('companies');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records',
            ]);
        }

        return view('auth.login');
    }

    public function logout(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect('login');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|unique:users|max:255',
                'password' => 'required',
                'email' => 'required|unique:users|email:rfc,dns',
            ]);
            $requestData = $request->except('password');
            // $requestData['password'] = Hash::make($request->password);
            $requestData['password'] = bcrypt($request->password);



            $user = User::create($requestData);
        };

        return view('auth.register');
    }
}

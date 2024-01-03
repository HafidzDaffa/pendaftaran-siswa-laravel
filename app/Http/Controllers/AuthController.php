<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();

        if(Auth::attempt(['email' => $input['email'], 'password' =>  $input['password']])) {
            $role = Auth::user()->role;
            if($role == 'admin')
            {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            else
            {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
       
        return back()->with('error', 'Login Gagal!');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'no_wa' => 'required',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();

        User::create([
            "email" => $input['email'],
            "password" => Hash::make($input['password']),
            'no_wa' => "0813212321312",
            'remember_token' => Str::random(10),
            'role' => 'wali_murid',
        ]);

        return redirect()->route('login.index');
    }
}

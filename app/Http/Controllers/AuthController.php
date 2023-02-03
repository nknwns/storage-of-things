<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' =>'required|email|unique:App\Models\User',
            'password' =>'required|min:6',
        ]);

        $user = new User();

        $user->fill($validated);

        $user->password = Hash::make(request('password'));
        $user->role_id = 2;

        $user->save();
        $user->createToken('apptoken')->plainTextToken;

        return redirect('/login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function registration() {
        return view('auth.registration');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

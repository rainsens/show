<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(StoreRegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_agree' => (bool)$request->agree,
        ]);
        session()->flash('success', 'Registration successful! Please login.');
        return redirect()->route('login');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('success', 'Login successful!');
            return redirect('/');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        session()->flash('success', 'Logout successful!');
        return redirect('login');
    }
}

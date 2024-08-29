<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \App\Http\Requests\Auth\Login as LoginRequest;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * To Login user.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}

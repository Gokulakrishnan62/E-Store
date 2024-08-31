<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\Register as RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);

            return redirect()->intended('admin/dashboard');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Duplicate entry error code
                return redirect()->back()->withErrors(['email' => 'The email address is already registered.'])->withInput();
            }
            throw $e;
        }
    }
}

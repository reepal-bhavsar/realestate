<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create() {
        return inertia('Auth/Login');
    }

    public function store(Request $request) {

        if(!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) { //true: remember me while login
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended('/listing');

    }

    public function destroy(Request $request) {
        Auth::logout();

        $request->session()->invalidate(); //deletes the generated sessions
        $request->session()->regenerateToken(); //Regenerates CSRF Token value
        
        return redirect()->route('listing.index');
    }
}

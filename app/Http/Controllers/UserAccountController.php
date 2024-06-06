<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::create(
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed' //Check Hashing password function in app/Models/User.php
            ])
        );

        Auth::login($user); //It will automatically login the newly created user
        return redirect()->route('listing.index')->with('success', 'Account created!');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
    
        $credentials = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required', 'lowercase', 'email', 'max:255', 'unique:users'],  
            'password' => ['required', 'confirmed', 'min:3'],
        ]);

        $user = User::create($credentials);

        //send email

        Auth::login($user);

        return redirect()->route('home');
    }
}

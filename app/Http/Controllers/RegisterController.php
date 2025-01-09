<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::min(6)->letters(), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        $request->session()->regenerate();

        event(new Registered($user));

        return view('register.verify-email');
    }

    public function notice()
    {
        return view('register.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/profile');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}

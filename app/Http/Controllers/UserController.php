<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => ['required', 'min:3', 'max:250']
        ]);

        $userAttributes['name'] = $request->input('name');

        if (! empty($request->input('password'))) {
            $request->validate([
                'password' => ['required', Password::min(6)->letters(), 'confirmed']
            ]);

            $userAttributes['password'] = $request->input('password');;
        }

        if (! empty($userAttributes)) {
            $user->update($userAttributes);
        }

        $employerAttributes = $request->validate([
            'code' => ['required', 'min:3', 'max:20'],
            'title' => ['required', 'min:3', 'max:250'],
            'address' => ['required', 'min:3', 'max:250'],
            'image' => ['required', File::types(['png', 'jpeg', 'webp'])],
            'url' => ['url']
        ]);

        if (! empty($request->file('image'))) {
            if (! empty($user->employer->image)) {
                Storage::disk('public')->delete($user->employer->image);
            }
            $imgPath = $request->file('image')->store('logotypes');
        }

        unset($employerAttributes['image']);

        $employerAttributes['image'] = $imgPath;

        if (empty($user->employer)) {
            $user->employer()->create($employerAttributes);
        } else {
            $user->employer()->update($employerAttributes);
        }

        return redirect('/profile');
    }
}

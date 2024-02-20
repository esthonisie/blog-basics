<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(StoreSessionsRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Please fill in the correct email.',
                'password' => 'Please fill in the correct password.'
            ]);    
        }

        session()->regenerate();

        return redirect(route('posts.index'))->with('success', 'Welcome Back!');   
    }

    public function destroy()
    {
        auth()->logout();

        return redirect(route('posts.index'))->with('success', 'Goodbye!');
    }
}

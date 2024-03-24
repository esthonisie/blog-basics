<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(StoreSessionsRequest $request): RedirectResponse
    {
        $validated = $request->validated();
 
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
 
            return redirect(route('posts.index'))
                ->with('success', 'Welcome Back!');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect(route('posts.index'))
            ->with('success', 'Goodbye!');
    }
}
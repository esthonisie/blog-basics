<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['role_id'] = 4;
            
        $user = User::create($attributes);

        auth()->login($user);
        
        if ($request->post('membership') == 'free') {
            return redirect(route('posts.index'))
            ->with('success', 'Your account has been created.');
        } else {
            return redirect(route('register.edit'));
        }
    }

    public function edit()
    {
        return view('register.edit');
    }

    public function update(): RedirectResponse
    {
        $user_id = auth()->id();

        User::where('id', $user_id)
        ->update(['role_id' => 3]);

        return redirect(route('posts.index'))
            ->with('success', 'Your PREMIUM account has been activated.');
    }
}

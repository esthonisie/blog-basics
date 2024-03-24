<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $validated = $request->validated();

        $role_free = Role::where('name', 'subscriber_free')->first()->id;
        $validated['role_id'] = $role_free;
            
        $user = User::create($validated);

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
        $role_premium = Role::where('name', 'subscriber_premium')->first()->id;
        $subscriber = request()->user();
        $subscriber->update(['role_id' => $role_premium]);

        return redirect(route('posts.index'))
            ->with('success', 'Your PREMIUM account has been activated.');
    }
}

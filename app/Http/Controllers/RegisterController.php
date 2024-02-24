<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
          
        return redirect(route('posts.index'))->with('success', 'Your account has been created.');
    }
}

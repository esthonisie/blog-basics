<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // TODO: stop validatie in aparte form request validation class
        // TODO: gebruik duidelijkere naamgeving voor variable "attriubtes", bijv.: "validated"
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:100'],
        ]);
        
        Category::create($attributes);
          
        return redirect(route('creators.index'))
            ->with('success', 'New Category Added');
    }
}
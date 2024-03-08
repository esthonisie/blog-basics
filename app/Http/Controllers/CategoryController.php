<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('categories.show', ['posts' => $category->posts()
        ->with('user', 'categories')
        ->orderByDesc('created_at')
        ->SimplePaginate(24)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:100'],
        ]);
        
        Category::create($attributes);
          
        return redirect(route('creators.index'))
            ->with('success', 'New Category Added');
    }
}
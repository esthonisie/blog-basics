<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->with('user', 'categories')->get();
        return view('categories.show', compact('posts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:100'],
        ]);
        
        Category::create($attributes);
          
        return redirect(route('dashboard.index'))->with('success', 'New Category Added');
    }

}

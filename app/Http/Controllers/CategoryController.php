<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        Category::create($validated);
          
        return redirect(route('creators.index'))
            ->with('success', 'New Category Added');
    }
}
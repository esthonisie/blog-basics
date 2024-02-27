<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'gardening unfiltered'
        ]);

        Category::create([
            'name' => 'podcast'
        ]);

        Category::create([
            'name' => 'gardening hacks'
        ]);

        Category::create([
            'name' => '(un)wanted wildlife'
        ]);

        Category::create([
            'name' => 'garden mysteries'
        ]);
        
        Category::create([
            'name' => 'tutorial'
        ]);

        Category::create([
            'name' => 'interview'
        ]);

        Category::create([
            'name' => 'art & illustration'
        ]);

        Category::create([
            'name' => 'crafts'
        ]);

        Category::create([
            'name' => 'inspiration'
        ]);
    }
}

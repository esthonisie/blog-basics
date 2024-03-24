<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allCategories = [
            'gardening unfiltered', 
            'podcast', 
            'gardening hacks', 
            '(un)wanted wildlife',
            'garden mysteries',
            'tutorial',
            'interview',
            'art & illustration',
            'crafts',
            'inspiration',
        ];
        
        foreach ($allCategories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}

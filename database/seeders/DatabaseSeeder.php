<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class
        ]);

        Post::factory(32)->create();

        foreach (Post::all() as $post) {
            $randomCategories = Category::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->categories()->attach($randomCategories);
        }
    }
}

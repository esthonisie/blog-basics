<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'content_creator'
        ]);

        Role::create([
            'name' => 'subscriber_premium'
        ]);

        Role::create([
            'name' => 'subscriber_free'
        ]);   
    }
}

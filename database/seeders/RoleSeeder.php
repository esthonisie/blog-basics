<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = [
            'admin', 
            'content_creator', 
            'subscriber_premium', 
            'subscriber_free'
        ];
        
        foreach ($allRoles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}

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
        // TODO: je kunt code besparen door alle name values in een array te zetten en hier
        // doorheen te loopen
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

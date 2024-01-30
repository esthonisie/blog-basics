<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'first_name' => 'Elaine',
            'last_name' => 'Marley',
            'email' => 'bigwhoop@gsnail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'role_id' => 2,
            'first_name' => 'Guybrush',
            'last_name' => 'Threepwood',
            'email' => '3headedmonkey@gsnail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'role_id' => 2,
            'first_name' => 'Fester',
            'last_name' => 'Shinetop',
            'email' => 'lechuckrules@gsnail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'role_id' => 3,
            'first_name' => 'Herman',
            'last_name' => 'Toothrot',
            'username' => 'ChattyHermit',
            'email' => 'bananapicker@gsnail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'role_id' => 4,
            'first_name' => 'Rapp',
            'last_name' => 'Scallion',
            'username' => 'DeadRapp35',
            'email' => 'steaminweeniehut@gsnail.com',
            'password' => Hash::make('password')
        ]);
    }
}

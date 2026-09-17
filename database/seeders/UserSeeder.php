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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@12345'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Professor',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Prof@12345'),
            'role' => 'professor'
        ]);
        
        User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('Student@12345'),
            
        ])
    }
}

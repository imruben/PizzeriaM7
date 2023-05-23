<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'pepe',
            'email' => 'pepe@pepe',
            'is_admin' => false,
            'password' => Hash::make('12345678'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'pepeAdmin',
            'email' => 'pepe@admin',
            'is_admin' => true,
            'password' => Hash::make('12345678'),
        ]);
    }
}

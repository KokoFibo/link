<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Anton',
            'title' => 'Business Development',
            'email' => 'kokonacci@gmail.com',
            'email_verified_at' => now(),
            'code' => Str::toBase64(fake()->randomNumber(7, true)),
            'password' => Hash::make('Anton888'),
        ]);

        \App\Models\User::factory(30)->create();
    }
}

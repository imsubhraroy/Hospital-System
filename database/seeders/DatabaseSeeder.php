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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => 8927837533,
            'address' => "Hasnabad",
            'usertype' => 1,
            'email_verified_at' => "2023-07-02 22:25:07",
            "password" => Hash::make("Admin@123"),
        ]);
    }
}

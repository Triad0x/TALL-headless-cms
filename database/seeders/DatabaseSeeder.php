<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->make(['email' => 'test@example.com']);

        User::firstOrCreate(
            ['email' => $user->email],
            $user->only(['name', 'password', 'email_verified_at', 'remember_token']),
        );

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            PageSeeder::class,
        ]);
    }
}

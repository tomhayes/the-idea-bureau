<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'The Idea Bureau',
                'email' => 'theideabureau@example.com',
                'password' => Hash::make('password'),
            ],
        );
        User::factory()->create(
            [
                'name' => 'Kate Sklar',
                'email' => 'katesklar@example.com',
                'password' => Hash::make('password'),
            ],
        );

        $this->call(PostSeeder::class);
        $this->call(TopicSeeder::class);
    }
}

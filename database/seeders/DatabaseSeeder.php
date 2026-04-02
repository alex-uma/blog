<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        \App\Models\Category::factory(5)->create();

        \App\Models\Post::factory(100)->create();

        $this->call(TagSeeder::class);
    }
}

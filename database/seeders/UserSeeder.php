<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Alex Uma',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');

        \App\Models\User::factory()->create([
            'name' => 'Maria Gomez',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Blogger');

        \App\Models\User::factory()->create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::factory(17)->create();
    }
}

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
        $this->call([
            SettingSeeder::class,
            ServiceSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
            ProductSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@braintech.com',
            'password' => bcrypt('password'),
        ]);
    }
}

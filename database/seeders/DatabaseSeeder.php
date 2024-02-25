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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  =>  bcrypt('1'),
        ]);

        $this->call([
            ServiceSeeder::class,
            PrivacyPolicySeeder::class,
            TermsConditionSeeder::class,
            SocialMediaSeeder::class,
            ContactSeeder::class,
            AboutUsSeeder::class,
        ]);
    }
}

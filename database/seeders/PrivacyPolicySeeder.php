<?php

namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Privacy::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
        ]);
    }
}

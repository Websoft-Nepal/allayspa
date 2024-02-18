<?php

namespace Database\Seeders;

use App\Models\TermsCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TermsConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        TermsCondition::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
        ]);
    }
}

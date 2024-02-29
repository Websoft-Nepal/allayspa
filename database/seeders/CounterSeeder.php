<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Counter::create([
            'years_of_experience'=>0,
            'happy_clients'=>0,
            'certifications'=>0,
        ]);
    }
}

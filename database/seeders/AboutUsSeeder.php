<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title' => 'About Us',
            'description' => 'An About Us page can include a wide array of information, but the most common sections to include are: Who you serve and what you do for them. Your brand story/history, including how you got started. Your mission and vision for the company.'
        ]);
    }
}

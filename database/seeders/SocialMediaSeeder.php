<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'facebook'=>'www.facebook.com',
            'instagram'=>'www.instagram.com',
            'twitter'=>'www.twitter.com',
            'youtube'=>'www.youtube.com'
        ]);
    }
}

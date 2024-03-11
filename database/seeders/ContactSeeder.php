<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Fauxify\Fauxify\Fauxify;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fauxify = Fauxify::create();

        Contact::create([
            'email' => 'test@gmail.com',
            'phone' => $fauxify->mobileNumber(),
            'tel'   =>  $fauxify->mobileNumber(),
            'fax'   =>  rand(111111, 9999999),
            'address'   =>  $fauxify->city(),
        ]);
    }
}

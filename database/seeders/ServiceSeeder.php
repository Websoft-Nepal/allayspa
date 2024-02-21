<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'          => 'Service 1',
                'slug'          => 'service-1',
                'description'   => 'Description for Service 1',
                'image'         =>  env('URL') . '/services/bill.png',
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now(),
            ],
            [
                'name'          => 'Service 2',
                'slug'          => 'service-2',
                'description'   => 'Description for Service 2',
                'image'         =>  env('URL') . '/services/bill.png',
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now(),
            ],
            [
                'name'          => 'Service 3',
                'slug'          => 'service-3',
                'description'   => 'Description for Service 3',
                'image'         =>  env('URL') . '/services/bill.png',
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now(),
            ]
        ];

        \App\Models\Service::insert($data);
    }
}

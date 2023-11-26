<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadMapSeeder extends Seeder
{

    public function run()
    {
        DB::table('road_maps')->insert([
            [
                'image' => 'img\roadmap.jpg',
            ]
        ]);
    }
}

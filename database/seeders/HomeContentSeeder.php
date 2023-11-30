<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{

    public function run()
    {
        DB::table('home_contents')->insert([
            [
                'header' => 'Jo Rover',
                'description' => '	Fab Lab | Orange Coding Academy Irbid Fab Lab | Orange Coding Academy Irbid Fab Lab | Orange Coding Academy Irbid Fab Lab | Orange Coding Academy Irbid Fab Lab | Orange Coding Academy Irbid Fab Lab | Orange Coding Academy Irbid ',
                'image1' => 'img/content1.jpg',
                'image2' => 'img/content1.jpg',
                'image3' => 'img/content1.jpg',
            ],
        ]);
    }
}

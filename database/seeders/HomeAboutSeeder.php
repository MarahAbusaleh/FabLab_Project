<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeAboutSeeder extends Seeder
{

    public function run()
    {
        DB::table('home_abouts')->insert([
            [
                'header' => 'Jo Rover',
                'description' => 'Description about JoRover Description about JoRover Description about JoRover Description about JoRover Description about JoRover Description about JoRover Description about JoRover Description about JoRover',
                'image' => 'img/jorover.png',
            ],
        ]);
    }
}

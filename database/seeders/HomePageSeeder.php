<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{

    public function run()
    {
        DB::table('home_pages')->insert([
            [
                'header' => 'Jo Rover 1',
                'text' => '	Fab Lab | Orange Coding Academy Irbid 1',
                'media' => 'img\fablab_slider.jpg',
                'mediaType' => 'image',
            ],
            [
                'header' => 'Jo Rover 2',
                'text' => '	Fab Lab | Orange Coding Academy Irbid 2',
                'media' => 'img\fablab_slider.jpg',
                'mediaType' => 'image',
            ],
            [
                'header' => 'Jo Rover 3',
                'text' => '	Fab Lab | Orange Coding Academy Irbid 3',
                'media' => 'img\video_silder.mp4',
                'mediaType' => 'video',
            ],
        ]);
    }
}

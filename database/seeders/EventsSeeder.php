<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{

    public function run()
    {
        DB::table('events')->insert([
            [
                'id' => '1',
                'name' => 'About Orange FabLabs program 1',
                'description' => 'The FabLab is a space dedicated towards teaching students the art of digital fabrication along with the accompanying design philosophies.',
                'image' => 'img\C1.jpg',
                'date' => now()->addDays(7),
            ],
            [
                'id' => '2',
                'name' => 'About Orange FabLabs program 2',
                'description' => 'The FabLab is a space dedicated towards teaching students the art of digital fabrication along with the accompanying design philosophies.',
                'image' => 'img\C1.jpg',
                'date' => now()->addDays(2),
            ],
            [
                'id' => '3',
                'name' => 'About Orange FabLabs program 3',
                'description' => 'The FabLab is a space dedicated towards teaching students the art of digital fabrication along with the accompanying design philosophies.',
                'image' => 'img\C1.jpg',
                'date' => now()->addDays(5),
            ],
        ]);
    }
}

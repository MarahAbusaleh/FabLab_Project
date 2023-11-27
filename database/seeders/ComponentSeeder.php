<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{

    public function run()
    {
        DB::table('components')->insert([
            [
                'name' => '2CameraDisplay',
                'image' => 'img/Components/2CameraDisplay.png',
                'description' => '2CameraDisplay'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2LightSpeedMode',
                'image' => 'img/Components/2LightSpeedMode.png',
                'description' => '2LightSpeedMode'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2MovmentControl1',
                'image' => 'img/Components/2MovmentControl1.png',
                'description' => '2MovmentControl1'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2MovmentControl2',
                'image' => 'img/Components/2MovmentControl2.png',
                'description' => '2MovmentControl2'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2MovmentControl3',
                'image' => 'img/Components/2MovmentControl3.png',
                'description' => '2MovmentControl3'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2Nextion',
                'image' => 'img/Components/2Nextion.png',
                'description' => '2Nextion'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => '2RGB',
                'image' => 'img/Components/2RGB.png',
                'description' => '2RGB'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'A2',
                'image' => 'img/Components/A2.jpg',
                'description' => 'A2'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'Camera',
                'image' => 'img/Components/Camera.png',
                'description' => 'Camera'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'Emergency Switch',
                'image' => 'img/Components/Emergency Switch.png',
                'description' => 'Emergency Switch'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'Fans',
                'image' => 'img/Components/Fans.png',
                'description' => 'Fans'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'PCB',
                'image' => 'img/Components/PCB.png',
                'description' => 'PCB'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'Power Supply',
                'image' => 'img/Components/Power Supply.png',
                'description' => 'Power Supply'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'Router',
                'image' => 'img/Components/Router.png',
                'description' => 'Router'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'SearchLights',
                'image' => 'img/Components/SearchLights.png',
                'description' => 'SearchLights'
            ]
        ]);
        DB::table('components')->insert([
            [
                'name' => 'SolarPanels',
                'image' => 'img/Components/SolarPanels.png',
                'description' => 'SolarPanels'
            ]
        ]);
    }
}

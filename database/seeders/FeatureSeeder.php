<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{

    public function run()
    {
        DB::table('features_pages')->insert([
            [
                'mainImage' => 'img/A1 (Info.).png'
            ]
        ]);
    }
}

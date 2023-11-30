<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInfoSeeder extends Seeder
{

    public function run()
    {
        DB::table('contact_infos')->insert([
            [
                'email' => 'JoRover@gmail.com',
                'phone' => '+962 7 8765 4321',
                'facebook' => 'https://orange.jo/en/corporate/csr/fab-labs',
                'youtube' => 'https://orange.jo/en/corporate/csr/fab-labs',
                'twitter' => 'https://orange.jo/en/corporate/csr/fab-labs',
            ],
        ]);
    }
}

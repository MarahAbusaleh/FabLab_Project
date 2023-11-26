<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{

    public function run()
    {
        DB::table('teams')->insert([
            [
                'id' => '1',
                'name' => 'Karam Khrais',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\B1 (Karam Khrais).jpeg',
                'role' => 'instructor',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '2',
                'name' => "Dia'a Al-Zghoul",
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\B2 (Diaa Al-Zghoul).jpeg',
                'role' => 'instructor',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '3',
                'name' => 'Majdi Al-Manasser',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\B3 (Majdi Al-Manasser).JPG',
                'role' => 'instructor',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '4',
                'name' => 'Student B1',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B1.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '5',
                'name' => 'Student B2',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 2500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B2.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '7',
                'name' => 'Student B4',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B4.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '8',
                'name' => 'Student B5',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 5500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B5.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '9',
                'name' => 'Student B6',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 6500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B6.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '10',
                'name' => 'Student B7',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 7500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B7.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '11',
                'name' => 'Student B8',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 8500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B8.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],
            [
                'id' => '12',
                'name' => 'Student B9',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 9500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'image' => 'img\team\Student B9.JPG',
                'role' => 'student',
                'email' => 'example@gmail.com',
            ],

        ]);
    }
}

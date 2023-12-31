<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AdminSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(TeamsSeeder::class);
        $this->call(RoadMapSeeder::class);
        $this->call(HomePageSeeder::class);
        $this->call(ComponentSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(HomeContentSeeder::class);
        $this->call(HomeAboutSeeder::class);
        $this->call(ContactInfoSeeder::class);
    }
}

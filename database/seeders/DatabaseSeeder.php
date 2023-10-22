<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => bcrypt('password'),
         ]);

         City::create([
             'name' => 'New York',
             'latitude' => 40.7143528,
             'longitude' => -74.0059731,
         ]);

            City::create([
                'name' => 'London',
                'latitude' => 51.5085300,
                'longitude' => -0.1257400,
            ]);

            City::create([
                'name' => 'Paris',
                'latitude' => 48.8534100,
                'longitude' => 2.3488000,
            ]);

            City::create([
                'name' => 'Tokyo',
                'latitude' => 35.6895000,
                'longitude' => 139.6917100,
            ]);

            City::create([
                'name' => 'Sydney',
                'latitude' => -33.8678500,
                'longitude' => 151.2073200,
            ]);

            City::create([
                'name' => 'Cape Town',
                'latitude' => -33.9258400,
                'longitude' => 18.4232200,
            ]);

            City::create([
                'name' => 'Rome',
                'latitude' => 41.8919300,
                'longitude' => 12.5113300,
            ]);

            City::create([
                'name' => 'Hong Kong',
                'latitude' => 22.2793278,
                'longitude' => 114.1628131,
            ]);
    }
}

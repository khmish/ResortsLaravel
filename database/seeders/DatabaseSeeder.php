<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Resort;
use App\Models\Availabletime;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Rent;
use App\Models\Feature;
use App\Models\Featureresort;
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
        User::factory(10)->create();
        // Country::factory(1)->create();
        // City::factory(1)->make([]);
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
        ]);
        District::factory(6)->create();
        Resort::factory(10)->create();
        Availabletime::factory(100)->create();
        Rent::factory(100)->create();
        Feature::factory(100)->create();
        Featureresort::factory(10)->create();
    }
}

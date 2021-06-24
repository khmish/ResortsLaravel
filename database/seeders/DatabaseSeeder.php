<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Resort::factory(10)->create();
        \App\Models\AvailableTime::factory(100)->create();
        \App\Models\Rent::factory(100)->create();
        \App\Models\Feature::factory(100)->create();
        \App\Models\Featureresort::factory(10)->create();
    }
}

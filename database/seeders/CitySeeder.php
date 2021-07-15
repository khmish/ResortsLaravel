<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert( [
            [
            //
                'name' => "Riyadh",
                "country_id" => 1
            ],
            [
            //
                'name' => "Dammam",
                "country_id" => 1
            ],
            [
            //
                'name' => "Jeddah",
                "country_id" => 1
            ],
            [
            //
                'name' => "Makkah",
                "country_id" => 1
            ],
            [
            //
                'name' => "Mannama",
                "country_id" => 2
            ],
            [
            //
                'name' => "Moharraq",
                "country_id" => 2
            ],
        ]);
    }
}

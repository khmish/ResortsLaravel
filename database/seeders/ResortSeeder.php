<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= new Faker;

        for ($i=0; $i < 100; $i++) { 
            # code...
            $count=$i+1;
            DB::table("resort")->insert([
               'id'=>$count,
               'name'=> $faker->email,
               'description'=>$faker->text,
               'longitude'=>null,
               'latitude'=>null,
               'media'=>null,
            ]);
        }
    }
}

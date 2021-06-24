<?php

namespace Database\Factories;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rentedDate' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'state' => rand(0,2),
            'rentedBy' => rand(1,10),
            'AvailableTime_id' => rand(1,100),
        ];
    }
}

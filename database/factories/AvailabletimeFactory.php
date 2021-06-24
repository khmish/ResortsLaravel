<?php

namespace Database\Factories;

use App\Models\Availabletime;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabletimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Availabletime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'availableDate' => $this->faker->date(),
            'startTime' => $this->faker->time(),
            'endTime' => $this->faker->time(),
            'createdBy' => rand(1,10),
            'Resort_id' => rand(1,10),
            'cost' => rand(300,10000),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Resort;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resort::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->words(5, true),
            'district_id' => rand(1,6),
            'createdBy' => rand(1,10),
        ];
    }
}

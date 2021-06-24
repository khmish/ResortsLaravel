<?php

namespace Database\Factories;

use App\Models\Featureresort;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureresortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Featureresort::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "Feature_id" => rand(1,100),
            "Resort_id" => rand(1,10),
            "description" => $this->faker->realText(rand(10, 20)),
            "number" => rand(1,4),
        ];
    }
}

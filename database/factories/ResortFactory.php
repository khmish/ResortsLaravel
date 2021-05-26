<?php

namespace Database\Factories;

use App\Models\Resort;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'id'=>Str::uuid(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}

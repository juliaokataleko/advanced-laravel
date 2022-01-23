<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'about' => $this->faker->paragraph(),
            'rating' => rand(1, 5),
            'active' => rand(0,1)
        ];
    }
}

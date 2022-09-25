<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->name(),
            'age' => $this->faker->randomNumber(2, false),
            'nationality' => $this->faker->country(),
            'wins' => $this->faker->randomNumber(2, false),
            'losses' => $this->faker->randomNumber(2, false)
        ];
    }
}

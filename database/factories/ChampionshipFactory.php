<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Championship>
 */
class ChampionshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->company() ,
            'game' => $this->faker->safeColorName(),
            'start_date' => $this->faker->date('Y_m_d'),
            'finish_date' => $this->faker->date('Y_m_d')
        ];
    }
}

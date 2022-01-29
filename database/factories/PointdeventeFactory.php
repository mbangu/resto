<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointdeventeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idrestaurant' => Restaurant::factory(),
            'pointdevente' => $this->faker->name(),
            'description' => $this->faker->paragraph(2)
        ];
    }
}

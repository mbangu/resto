<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServeurFactory extends Factory
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
            'serveur' => $this->faker->name(),
            'iduser_serveur' => User::factory(),
        ];
    }
}

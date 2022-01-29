<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'client' => $this->faker->name(),
            'code' => 'client-'. uniqid(), 
            'telephone' => $this->faker->phoneNumber(),
            'date_creation' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\CategorieRestaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idcategorie_restaurant' => CategorieRestaurant::factory(),
            'iduser_restaurant'=> User::factory(),
            'nom_restaurant' => $this->faker->name(30),
            'adresse' => $this->faker->address(),
            'contact' => $this->faker->phoneNumber(),
            'date_creation' => now(),
        ];
    }
}

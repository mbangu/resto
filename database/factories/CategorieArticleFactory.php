<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieArticleFactory extends Factory
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
            'categorie' => $this->faker->word(),
            'description'=> $this->faker->paragraph(2)
        ];
    }
}

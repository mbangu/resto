<?php

namespace Database\Factories;

use App\Models\CategorieArticle;
use App\Models\Devise;
use App\Models\Pointdevente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idcategorie_article' => CategorieArticle::factory(),
            'idpointdevente' => Pointdevente::factory(),
            'article' => $this->faker->word(10),
            'description'=>$this->faker->text(),
            'image' =>$this->faker->imageUrl(500, 500, 'alimentation', true, 'foods'),
            'iddevise' => Devise::factory(),
            'prix' => $this->faker->randomFloat(3,1000,100000)
        ];
    }
}

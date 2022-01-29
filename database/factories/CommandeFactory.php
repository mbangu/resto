<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Serveur;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;
use OpenApi\Annotations\Server;

class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idtable' => Table::factory(),
            'idserveur' => Serveur::factory(),
            'idclient' => Client::factory(),
            'nom_client' => $this->faker->name(),
            'numero_cmd' => 'cmd-'. uniqid(),
            'date' => now(),
        ];
    }
}

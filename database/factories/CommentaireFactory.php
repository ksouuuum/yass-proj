<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Ressource;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $unUser = User::inRandomOrder()->first();           // Un utilisateur enregistré pris aléatoirement
        $unRes = Ressource::inRandomOrder()->first();       // une ressource prise aleatoirement

        return [
            //
            "corps" => fake()->paragraphs(5, true),
            "user_id"=> $unUser->id ,
            "ressource_id" => $unRes->id,
        ];
    }
}



<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Catalogue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ressource>
 */
class RessourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $unUser = User::inRandomOrder()->first();           // Un utilisateur enregistré pris aléatoirement
        $unCat = Catalogue::inRandomOrder()->first();       // un catalogue pris aleatoirement

        return [
            //
            "titre" => fake()->sentence(3),         // Une phrase de 3 mots
            "corps" => fake()->paragraphs(5, true), // 5 phrases                        
            "media" => 'ressource-img.jpg',         // on stocke le nom de fichier image 
            "nbvus"=> fake()->randomNumber(5, true),//nomre entier de 5 chiffres 
            "nblikes"=> fake()->randomNumber(7, true),
            "user_id"=> $unUser->id ,
            "catalogue_id"=> $unCat->id,
        ];
    }
}


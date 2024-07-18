<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sujet = array("Besoin d' un compte", "Signaler une publication", "Signaler un commentaire", "Idee de rubrique", "Idee pour le site", "Autre");
        echo $sujet[rand(0, count($sujet) - 1)];
        return [
            //
            "nom" => fake()->lastName(),        // 
            "prenom" => fake()->firstName(),    // 
            "email" => fake()->email(),         // 
            "mobile" => '0388828384',           // 
            "ip" =>  fake()->ipv4(),         // 
            "sujet" => $sujet[rand(0, count($sujet) - 1)],                        // 
            "message" => fake()->text(),   // 
            "traitee" => False,                 // 
            "traitement" => '',                 // 
        ];
    }
}

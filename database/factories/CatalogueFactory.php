<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalogue>
 */
class CatalogueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        //$filename = 'img' . Carbon::now()->format('YmdHs') . '.jpg';    // on fabrique un nom de fichier unique
        //Storage::copy('dbimg/catalogue/catalogue-img.jpg', 'dbimg/catalogue/' . $filename); // on fait une coppie de l image de base
        //Storage::put('dbimg/catalogue/' . $filename , file_get_contents("https://placehold.co/300.jpg?font=roboto&text=".$lib)); // on stocke l'image dans le local  storage
        return [
            // 
            "lib" => fake()->sentence(2), // Une phrase de 5 mots
            "commentaire" => fake()->text(), // Une chaîne de texte de 200 caractères (par défaut)                       
            "icone" => 'catalogue-img.jpg',   // on stocke le nom de fichier image 
        ];
    }
}

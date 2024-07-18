<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Catalogue;
use App\Models\Groupe;
use App\Models\Contact;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // creation des 4 entree corespondant aux 4 types de groupes
        DB::table('groupes')->insert([ 'lib' => 'AdminApp' ]);
        DB::table('groupes')->insert([ 'lib' => 'AdminContenu' ]);
        DB::table('groupes')->insert([ 'lib' => 'Moderateur' ]);
        DB::table('groupes')->insert([ 'lib' => 'Citoyen' ]);

        // creation de 5 entree dans cataogues
        Catalogue::factory(5)->create();
        
        //creation de 5 entree dans users
        User::factory(5)->create();

        //creation de 5 entree dans contacts 
        Contact::factory(5)->create();

        //reste la creation des entree pour les ressources et les commentaires 
     
    }
}

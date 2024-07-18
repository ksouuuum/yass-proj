<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 60)->comment('intitule de la ressource ');
            $table->text('corps')->comment('texte descriptif de la ressource ');
            $table->string('media', 100)->comment('url de  image associee a la ressource ou video youtube - image stockee dans storage, rep pour les images - la taille d l image est a définir ');
            $table->bigInteger('nbvus')->comment('nombre de vu, attribut calculé ');
            $table->bigInteger('nblikes')->comment('nombre de like attribut calculé ');
            $table->boolean('isactif')->default(True)->comment('Par defaut les ressouces sont actives ');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('catalogue_id');
            
            // Mise en place du lien 1-n entre user et ressources, puis entre catalogue et ressource 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('catalogue_id')->references('id')->on('catalogues');

            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};

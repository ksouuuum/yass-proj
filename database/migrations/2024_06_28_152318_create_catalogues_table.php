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
        Schema::create('catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('lib', 60)->comment('intitule du theme du catalogue');
            $table->text('commentaire')->nullable();
            $table->string('icone', 60)->comment('url de  image associee au thème du catalogue - image stocke dans storage, rep pour les images - la taille d l image est a définir ');
            $table->boolean('isactif')->default(True)->comment('Par defaut les thèmes sont actifs ');
            $table->timestamps();
            $table->softDeletes();

        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogues');
    }
};

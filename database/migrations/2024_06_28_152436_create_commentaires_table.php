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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('corps')->comment('contenu du commentaire ');

            $table->boolean('isactif')->default(True)->comment('Par defaut les comentaires sont actifs ');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ressource_id');

            // Mise en place du lien 1-n entre user et ressources, puis entre catalogue et ressource 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ressource_id')->references('id')->on('ressources');

            $table->timestamps(); 
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};

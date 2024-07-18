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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();           

            $table->string('nom', 50)->comment('nom du contact ');
            $table->string('prenom', 50)->comment('prenom du contact ');
            $table->string('email', 50)->comment('email');
            $table->string('mobile', 50)->comment('mobile');
            $table->ipAddress('ip')->comment('ip depuis laquelle le contact nous a contacté');
            $table->string('sujet', 50)->comment('Titre ou sujet du message envoyé par le contact');
            $table->text('message')->comment('le message laissé par le contact');
            //$table->date('traite_le')->nullable()->default(null)->comment('date à laquelle la demande du contact a été traité ');
            $table->boolean('traitee')->default(False)->comment('True si la demande a ete traitée, dans ce cas updated_at indique la dernière date de traitement');
            $table->text('traitement')->comment('trace des différents traitements effectués sur cette demande');

  
            $table->timestamps();
  
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

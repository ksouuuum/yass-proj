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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('groupe_id')->default(4)->comment('par defaut les users crées sont dans le groupe citoyen');

            // Mise en place du lien 1-n entre users et groupes
            $table->foreign('groupe_id')->references('id')->on('groupes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['groupe_id']);
            $table->dropColumn('groupe_id');
        });
    }
};

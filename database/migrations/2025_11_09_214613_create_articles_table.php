<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->json('title');  // Utilisation de JSON pour les titres multilingues
            $table->json('content');  // Utilisation de JSON pour les contenus multilingues
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // Lien avec la table categories
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');  // Lien avec la table users, l'étudiant
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};

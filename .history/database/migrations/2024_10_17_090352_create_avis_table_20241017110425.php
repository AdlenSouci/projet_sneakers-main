<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien vers l'utilisateur
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade'); // Lien vers l'article
            $table->text('contenu'); // Contenu de l'avis
            $table->integer('note'); // Note (par exemple, sur 5)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avis');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
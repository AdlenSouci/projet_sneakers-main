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
        Schema::create('tailles_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_article')->nullable(false);
            $table->integer('taille')->nullable(false);
            $table->timestamps();
            $table->foreign('id_article')->references('id')->on()


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tailles_articles');
    }
};

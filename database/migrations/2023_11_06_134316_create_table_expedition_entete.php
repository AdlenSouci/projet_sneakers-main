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
        Schema::create('expedition_entete', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_num_bon_livraison')->nullable(false);
            $table->unsignedBigInteger('id_clients')->nullable(false);
            $table->dateTime('date')->nullable(false);
            
            
            $table->timestamps();

            $table->index('date');
            $table->index('id');
            $table->foreign('id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedition_entete');
    }
};

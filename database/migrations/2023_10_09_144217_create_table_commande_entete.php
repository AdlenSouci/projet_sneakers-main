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
        Schema::create('commandes_entetes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable(false);
            $table->unsignedBigInteger('id_clients')->nullable(false);
            $table->unsignedBigInteger('id_num_commande')->nullable(false);
            
            $table->timestamps();

            $table->index('date');
            $table->index('id_num_commande');

            $table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_num_commande')->references('id')->on('commandes_entetes');
            
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_entetes');
    }
};

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
        Schema::create('commandes_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_num_commande')->nullable(false);
            $table->unsignedBigInteger('id_article')->nullable(false);
            $table->integer('id_quantite_commmande')->nullable(false);
            $table->decimal('prix_unitaire_brut',9,2)->nullable(false);
            $table->decimal('prix_unitaire_net',9,2)->nullable(false);
            $table->decimal('montant_ht',9,2)->nullable(false);
            $table->decimal('remise',9,2)->nullable(false);
            $table->timestamps();

            $table->index('montant_ht');
            $table->index('remise');


            //$table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_article')->references('id')->on('articles');
            $table->foreign('id_num_commande')->references('id')->on('commandes_entetes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_details');
    }
};

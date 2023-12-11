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
        Schema::create('clients', function (Blueprint $table) {
           
            $table->id();

           // $table->unsignedBigInteger('id_clients')->nullable(false);
            $table->string('nom', 70)->nullable(false);
            $table->string('prenom', 70)->nullable(true);
            $table->date('date_de_naissance')->nullable(true);
            $table->string('adresse', 100)->nullable(false);
            $table->string('cp', 15)->nullable(false);
            $table->string('ville', 70)->nullable(false);
            $table->string('pays', 3)->nullable(false)->default('FRA');
            $table->string('adresse2', 100)->nullable(true);
            $table->string('cp2', 15)->nullable(true);
            $table->string('ville2', 70)->nullable(true);
            $table->string('pays2', 3)->nullable(true)->default('FRA');
            $table->enum('sexe', ['Femme', 'Homme', 'Autre'])->nullable(true);
            $table->string('telephone', 20)->nullable(true);
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('mot_de_passe', 190)->nullable(false);

            $table->timestamps();

            $table->index('nom');
            $table->index(['nom', 'prenom']);
            $table->index('email');
            $table->index('cp');
            $table->index('ville');
            $table->index('sexe');

            $table->foreign('pays')->references('alpha3')->on('pays');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
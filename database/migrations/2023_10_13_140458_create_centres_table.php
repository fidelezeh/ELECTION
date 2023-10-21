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
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ville_id',)->nullable()->constrained('detail_referentiels');
            $table->foreignId('departement_id',)->nullable()->constrained('detail_referentiels');
            $table->foreignId('arrondissement_id',)->nullable()->constrained('detail_referentiels');
            $table->string('quart_village', 155);
            $table->string('nom_centre', 155);
            $table->string('responsable', 155);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centres');
    }
};

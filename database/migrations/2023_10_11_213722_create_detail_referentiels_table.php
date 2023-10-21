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
        Schema::create('detail_referentiels', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();
            $table->string('libelle', 50)->unique();
            $table->foreignId('referentiel_id')->nullable()->constrained('referentiels');
            $table->foreignId('parent_id')->nullable()->constrained('detail_referentiels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_referentiels');
    }
};

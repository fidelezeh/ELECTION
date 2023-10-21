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
        Schema::create('bureau_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id',)->nullable()->constrained('centres');
            $table->string('quart_village', 155);
            $table->string('nom_bureau', 155);
            $table->string('responsable', 155);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_votes');
    }
};

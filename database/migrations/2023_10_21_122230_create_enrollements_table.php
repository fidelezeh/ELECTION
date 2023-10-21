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
        Schema::create('enrollements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id',)->nullable()->constrained('elections');
            $table->string('nom_complet', 80);
            $table->date('datenaiss');
            $table->string('lieunaiss', 55);
            $table->enum('isgenre', ['M', 'F']);
            $table->string('adresse', 155)->nullable();
            $table->string('profession', 155)->nullable();
            $table->string('phone', 12)->unique();
            $table->string('email', 60)->nullable();
            $table->string('parti_politik', 155)->nullable();
            $table->string('logo_parti')->nullable();
            $table->longText('programme_electoral')->nullable();
            $table->foreignId('centre_vote_id',)->nullable()->constrained('centres');
            $table->foreignId('type_piece_id',)->nullable()->constrained('detail_referentiels');
            $table->string('photo_piece')->nullable();
            $table->string('photo_citoyen')->nullable();
            $table->string('code_vote')->unique();
            $table->enum('isstatut', ['ELECTEUR', 'CANDIDAT'])->nullable();
            $table->enum('isetat', ['ACTIVE', 'DESACTIVE'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollements');
    }
};

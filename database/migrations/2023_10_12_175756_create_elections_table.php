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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_election_id')->nullable()->constrained('detail_referentiels');
            $table->date('session_election')->unique();
            $table->date('date_d_verif_list')->nullable();
            $table->date('date_f_verif_list')->nullable();
            $table->date('date_d_campagne')->nullable();
            $table->date('date_f_campagne')->nullable();
            $table->date('date_d_vote')->nullable();
            $table->date('date_f_vote')->nullable();
            $table->foreignId('statut_election_id')->nullable()->constrained('detail_referentiels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};

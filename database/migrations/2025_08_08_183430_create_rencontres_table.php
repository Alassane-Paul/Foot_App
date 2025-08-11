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
        Schema::create('rencontres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->constrained('equipes')->onDelete('cascade');
            $table->foreignId('away_team_id')->constrained('equipes')->onDelete('cascade');
            $table->integer('home_team_score')->default(0);
            $table->integer('away_team_score')->default(0);
            $table->date('jour');
            $table->foreignId('stade_id')->constrained('stades')->onDelete('cascade');
            $table->time('heure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencontres');
    }
};

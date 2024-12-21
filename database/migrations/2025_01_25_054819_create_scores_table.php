<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judge_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('criterias')->onDelete('cascade');
            $table->decimal('score', 5, 2); // Allows scores like 85.50
            $table->timestamps();

            $table->unique(['judge_id', 'participant_id', 'criteria_id'], 'unique_score'); // Prevent duplicate scores for the same judge, participant, and criteria
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}

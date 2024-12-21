<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudgePageantTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('judge_pageant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judge_id')->constrained()->onDelete('cascade');
            $table->foreignId('pageant_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['judge_id', 'pageant_id']); // Prevent duplicate assignments
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('judge_pageant');
    }
}

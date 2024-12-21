<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalSubtitlesTable extends Migration
{
    public function up()
    {
        Schema::create('local_subtitles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('local_sections')->onDelete('cascade');
            $table->string('title'); // e.g., "Aspiring President/Student Regent"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_subtitles');
    }
}

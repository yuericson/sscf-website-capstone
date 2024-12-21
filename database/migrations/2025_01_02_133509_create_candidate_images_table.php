<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('candidate_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtitle_id')->constrained('local_subtitles')->onDelete('cascade');
            $table->string('name');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidate_images');
    }
}

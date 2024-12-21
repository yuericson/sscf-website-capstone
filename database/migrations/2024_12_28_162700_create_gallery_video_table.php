<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryVideoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gallery_video', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_album_id')->nullable()->constrained('gallery_album')->onDelete('cascade');
            $table->string('title');
            $table->string('url'); // YouTube embed URL
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gallery_video');
    }
}

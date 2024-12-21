<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUrlNullableInGalleryVideoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gallery_video', function (Blueprint $table) {
            $table->string('url')->nullable()->change(); // Make 'url' nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gallery_video', function (Blueprint $table) {
            $table->string('url')->nullable(false)->change(); // Revert 'url' back to NOT NULL
        });
    }
}

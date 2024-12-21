<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPathColumnToGalleryVideoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gallery_video', function (Blueprint $table) {
            $table->string('path')->nullable()->after('url'); // Adds 'path' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gallery_video', function (Blueprint $table) {
            $table->dropColumn('path'); // Removes 'path' column
        });
    }
}

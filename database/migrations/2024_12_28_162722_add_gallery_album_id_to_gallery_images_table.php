<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGalleryAlbumIdToGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->foreignId('gallery_album_id')->nullable()->constrained('gallery_album')->onDelete('set null')->after('alt_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropForeign(['gallery_album_id']);
            $table->dropColumn('gallery_album_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGalleryImagesTableAddAlbumId extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            // Check if the column doesn't exist before adding it
            if (!Schema::hasColumn('gallery_images', 'gallery_album_id')) {
                $table->foreignId('gallery_album_id')
                    ->nullable()
                    ->constrained('gallery_album')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            // Check if the column exists before dropping it
            if (Schema::hasColumn('gallery_images', 'gallery_album_id')) {
                $table->dropForeign(['gallery_album_id']);
                $table->dropColumn('gallery_album_id');
            }
        });
    }
}

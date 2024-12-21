<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forum_post_id')->constrained('forum_posts')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['like', 'unlike']);
            $table->timestamps();

            // Siguraduhin na walang duplicate na reaksyon
            $table->unique(['forum_post_id', 'user_id', 'type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}

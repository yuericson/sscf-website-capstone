<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingEventsTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('upcoming_events')) {
        Schema::create('upcoming_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
}

    public function down()
    {
        Schema::dropIfExists('upcoming_events');
    }
}

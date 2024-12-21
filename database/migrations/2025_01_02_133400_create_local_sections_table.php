<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('local_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Candidates for Upcoming Federal Election"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_sections');
    }
}

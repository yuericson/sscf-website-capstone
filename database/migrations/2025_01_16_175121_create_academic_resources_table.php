<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('academic_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_resources');
    }
}

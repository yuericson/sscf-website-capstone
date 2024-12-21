<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pageant_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->timestamps();

            $table->unique(['pageant_id', 'name']); // Prevent duplicate participant names within a pageant
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}

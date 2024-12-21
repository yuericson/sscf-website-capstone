<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('weight', 5, 2); // Allows weights like 25.50%
            $table->timestamps();

            $table->unique(['category_id', 'name']); // Prevent duplicate criteria names within a category
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('criterias');
    }
}

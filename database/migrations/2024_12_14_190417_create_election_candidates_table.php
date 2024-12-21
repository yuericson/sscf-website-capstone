<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('election_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('position_id'); // Foreign key to positions
            $table->timestamps();
    
            // Add the foreign key constraint
            $table->foreign('position_id')->references('id')->on('election_positions')->onDelete('cascade');
    
            // Add a unique constraint to prevent duplicate candidates with the same name for the same position
            $table->unique(['name', 'position_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_candidates');
    }
};

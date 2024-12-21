<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionVotersVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_voters_vote', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('voter_id'); // Foreign key sa voters_login
            $table->string('voter_name'); // Pangalan ng botante
            $table->json('votes'); // JSON column para sa mga boto
            $table->timestamps(); // created_at at updated_at columns

            // Foreign key constraint
            $table->foreign('voter_id')->references('id')->on('voters_login')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('election_voters_vote');
    }
}

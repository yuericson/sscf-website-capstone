<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComelecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comelecs', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('name'); // Name of the COMELEC user
            $table->string('email')->unique(); // Unique email
            $table->string('password'); // Password
            $table->string('role')->default('comelec'); // Role column
            $table->rememberToken(); // For "remember me" functionality
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comelecs');
    }
}

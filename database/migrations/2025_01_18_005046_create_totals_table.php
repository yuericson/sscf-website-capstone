<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->id();
            $table->year('year')->unique();
            $table->decimal('total_inflows', 15, 2)->default(0);
            $table->decimal('total_outflows', 15, 2)->default(0);
            $table->decimal('current_funds', 15, 2)->default(0);
            $table->decimal('ending_cash_on_hand', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('totals');
    }
}

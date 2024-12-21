<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDebitAndCreditToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('debit', 15, 2)->default(0)->after('amount');
            $table->decimal('credit', 15, 2)->default(0)->after('debit');
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['debit', 'credit']);
        });
    }
}

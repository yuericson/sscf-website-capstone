<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGraphSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('graph_settings', function (Blueprint $table) {
            $table->id();
            $table->string('graph_key')->unique(); // Unique identifier for each graph
            $table->boolean('is_visible')->default(true); // Visibility status
            $table->timestamps();
        });

        // Insert initial data without duplication
        $graphs = [
            ['graph_key' => 'registeredByCollegeSection', 'is_visible' => true],
            ['graph_key' => 'votesByCollegeSection', 'is_visible' => true],
            ['graph_key' => 'totalVotesAndAbstainSection', 'is_visible' => true],
            ['graph_key' => 'votesAbstainByCollegeSection', 'is_visible' => true],
            // Add more graphs as needed
        ];

        foreach ($graphs as $graph) {
            DB::table('graph_settings')->insertOrIgnore($graph);
        }
    }

    public function down()
    {
        Schema::dropIfExists('graph_settings');
    }
}

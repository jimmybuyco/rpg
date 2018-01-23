<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\stats;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->integer('kill');
            $table->integer('rock');
            $table->integer('wood');
            $table->integer('grass');
            $table->integer('coin');
            $table->timestamps();
        });

        $stats = new \App\stats();
        $stats->user=1;
        $stats->kill=0;
        $stats->rock=0;
        $stats->wood=0;
        $stats->grass=0;
        $stats->coin=0;
        $stats->save();

        $stats = new \App\stats();
        $stats->user=2;
        $stats->kill=0;
        $stats->rock=0;
        $stats->wood=0;
        $stats->grass=0;
        $stats->coin=0;
        $stats->save();

        $stats = new \App\stats();
        $stats->user=3;
        $stats->kill=0;
        $stats->rock=0;
        $stats->wood=0;
        $stats->grass=0;
        $stats->coin=0;
        $stats->save();

        $stats = new \App\stats();
        $stats->user=4;
        $stats->kill=0;
        $stats->rock=0;
        $stats->wood=0;
        $stats->grass=0;
        $stats->coin=0;
        $stats->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stats');
    }
}

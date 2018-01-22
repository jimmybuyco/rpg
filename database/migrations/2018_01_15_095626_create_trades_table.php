<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('buy');
            $table->integer('sell');
            $table->integer('level');
            $table->string('requirements');
            $table->timestamps();
        });


        $unitsModel = new \App\trades();
        $unitsModel->type = "rock";
        $unitsModel->buy = 50;
        $unitsModel->sell = 20;
        $unitsModel->save();

        $unitsModel = new \App\trades();
        $unitsModel->type = "wood";
        $unitsModel->buy = 50;
        $unitsModel->sell = 20;
        $unitsModel->save();

        $unitsModel = new \App\trades();
        $unitsModel->type = "grass";
        $unitsModel->buy = 50;
        $unitsModel->sell = 20;
        $unitsModel->save();

        $unitsModel = new \App\trades();
        $unitsModel->type = "gold";
        $unitsModel->buy = 1000;
        $unitsModel->sell = 500;
        $unitsModel->save();

        $unitsModel = new \App\trades();
        $unitsModel->type = "sword";
        $unitsModel->buy = 1000;
        $unitsModel->sell = 100;
        $unitsModel->level = 2;
        $unitsModel->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trades');
    }
}

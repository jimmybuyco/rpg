<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\achivements;

class CreateAchivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achivements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->string('title');
            $table->string('desc');
            $table->string('icon');
            $table->integer('enable');
            $table->timestamps();
        });


        foreach (\App\User::all() as $user){
            $achive = new \App\achivements();
            $achive->title="First Blood";
            $achive->user=$user->id;
            $achive->desc="First kill in the game";
            $achive->icon="firstblood.jpg";
            $achive->enable="0";
            $achive->save();

            $achive = new \App\achivements();
            $achive->user=$user->id;
            $achive->title="Rock star";
            $achive->desc="Gather 10000 rocks";
            $achive->icon="rockstar.jpg";
            $achive->enable="0";
            $achive->save();

            $achive = new \App\achivements();
            $achive->user=$user->id;
            $achive->title="Illegal Logger";
            $achive->desc="Gather 10000 woods";
            $achive->icon="logger.jpg";
            $achive->enable="0";
            $achive->save();

            $achive = new \App\achivements();
            $achive->user=$user->id;
            $achive->title="Grazer";
            $achive->desc="Gather 10000 grass";
            $achive->icon="grazer.jpg";
            $achive->enable="0";
            $achive->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('achivements');
    }
}

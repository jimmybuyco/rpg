<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\constant;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('defence');
            $table->integer('sp');
            $table->integer('sp_ctr');
            $table->integer('coin');
            $table->integer( 'hp');
            $table->integer( 'xp');
            $table->integer('rock');
            $table->integer('wood');
            $table->integer('grass');
            $table->integer('gold');
            $table->integer('miner1');
            $table->integer('miner1_box');
            $table->integer('miner2');
            $table->integer('miner2_box');
            $table->integer('miner3');
            $table->integer('miner3_box');
            $table->rememberToken();
            $table->timestamps();
        });

        $constant = new constant();
        $coins =  $constant->coin;





        $unitsModel = new \App\User();
        $unitsModel->name = "jim";
        $unitsModel->password = "asdf";
        $unitsModel->defence = $this->getRandom();
        $unitsModel->coin = $coins;
        $unitsModel->hp = 100;
        $unitsModel->sp = 5;
        $unitsModel->sp_ctr = 0;
        $unitsModel->miner1 = 10;
        $unitsModel->miner2 = 10;
        $unitsModel->miner3 = 10;
        $unitsModel->miner1_box = 0;
        $unitsModel->miner2_box = 0;
        $unitsModel->miner3_box = 0;
        $unitsModel->rock = 0;
        $unitsModel->wood = 0;
        $unitsModel->grass = 0;
        $unitsModel->gold = 0;
        $unitsModel->xp = 0;
        $unitsModel->save();

        $unitsModel = new \App\User();
        $unitsModel->name = "ryan";
        $unitsModel->password = "asdf";
        $unitsModel->defence  = $this->getRandom();
        $unitsModel->coin = $coins;
        $unitsModel->hp = 100;
        $unitsModel->sp = 5;
        $unitsModel->sp_ctr = 0;
        $unitsModel->miner1 = 10;
        $unitsModel->miner2 = 10;
        $unitsModel->miner3 = 10;
        $unitsModel->miner1_box = 0;
        $unitsModel->miner2_box = 0;
        $unitsModel->miner3_box = 0;
        $unitsModel->rock = 0;
        $unitsModel->wood = 0;
        $unitsModel->grass = 0;
        $unitsModel->gold = 0;
        $unitsModel->xp = 0;
        $unitsModel->save();

        $unitsModel = new \App\User();
        $unitsModel->name = "justin";
        $unitsModel->password = "asdf";
        $unitsModel->defence  = $this->getRandom();
        $unitsModel->coin = $coins;
        $unitsModel->hp = 100;
        $unitsModel->sp = 5;
        $unitsModel->sp_ctr = 0;
        $unitsModel->miner1 = 10;
        $unitsModel->miner2 = 10;
        $unitsModel->miner3 = 10;
        $unitsModel->miner1_box = 0;
        $unitsModel->miner2_box = 0;
        $unitsModel->miner3_box = 0;
        $unitsModel->rock = 0;
        $unitsModel->wood = 0;
        $unitsModel->grass = 0;
        $unitsModel->gold = 0;
        $unitsModel->xp = 0;
        $unitsModel->save();

        $unitsModel = new \App\User();
        $unitsModel->name = "mark";
        $unitsModel->password = "asdf";
        $unitsModel->defence  = $this->getRandom();
        $unitsModel->coin = $coins;
        $unitsModel->hp = 100;
        $unitsModel->sp = 5;
        $unitsModel->sp_ctr = 0;
        $unitsModel->miner1 = 10;
        $unitsModel->miner2 = 10;
        $unitsModel->miner3 = 10;
        $unitsModel->miner1_box = 0;
        $unitsModel->miner2_box = 0;
        $unitsModel->miner3_box = 0;
        $unitsModel->rock = 0;
        $unitsModel->wood = 0;
        $unitsModel->grass = 0;
        $unitsModel->gold = 0;
        $unitsModel->xp = 0;
        $unitsModel->save();
    }

    public function getRandom(){
        for($x=0;$x<5;$x++){

            $def[$x]=rand(1,3);
        }

        return implode("",$def);;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

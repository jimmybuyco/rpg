<?php

namespace App\Http\Controllers;

use App\trades;
use App\units;
use App\User;
use ClassPreloader\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\coins;
use App\constant;

class unitsController extends Controller
{

    protected $rock;
    protected $wood;
    protected $grass;
    protected $gold;

    public function __construct()
    {
        $constant = new constant();
        $this->rock = $constant->rock;
        $this->wood = $constant->wood;
        $this->grass = $constant->grass;
        $this->gold = $constant->gold;
    }

    public function updateCoins($miner, $coins, $user)
    {
        $unitsModel = new User();
        $coins++;
        $unitsModel->updateType('coins', $coins, $user);

        return $coins;
    }

    public function levelUp()
    {
        $user = \Illuminate\Support\Facades\Input::get("user");
        $type = \Illuminate\Support\Facades\Input::get("type");
        $unitsModel = new User();
        $units = $unitsModel->getUnits($user);
        $minerLevel = $units->$type/10;

        $req_coin = $minerLevel*1000;


        if($units->coin >= $req_coin){
            $unitsModel->updateType('coin',$units->coin - $req_coin, $user);
            $unitsModel->updateType($type,$units->$type+10, $user);
        }


        //return $coins;
    }

//    public function getMineRewards($type, $user)
//    {
//        $unitModel = new User();
//        $units = $unitModel->getUnits($user);
//        $curr = $units->$type;
//        $gold = $units->gold;
//        $chance = rand(1, 100) / 100;
//        $this->gainXp($user);
//        $reward_Item = $this->$type * $chance;
//        $reward_golds = $this->gold * $chance;
//        $unitModel->updateType($type, floor($reward_Item) + $curr, $user);
//        $unitModel->updateType('gold', floor($reward_golds) + $gold, $user);
//        if ($type == "rock")
//            $typeOfMiner = "miner1";
//        if ($type == "wood")
//            $typeOfMiner = "miner2";
//        if ($type == "grass")
//            $typeOfMiner = "miner3";
//        $unitModel->resetGather($typeOfMiner, $user);
//        return floor($reward_Item) . " " . $type . " received. " . floor($reward_golds) . " gold received.";
//    }

public  function collect(){
            $user = \Illuminate\Support\Facades\Input::get("user");
            $type = \Illuminate\Support\Facades\Input::get("type");
    $unitModel = new User();
    $units = $unitModel->getUnits($user);
    if ($type == "rock")
        $typeOfMiner = "miner1_box";

    if ($type == "wood")
        $typeOfMiner = "miner2_box";
    if ($type == "grass")
        $typeOfMiner = "miner3_box";

    $qty = $units->$typeOfMiner;
    $type_qty = $units->$type;


$this->gainXp($qty,$user);
   $unitModel->updateType($typeOfMiner, 0, $user);
   $unitModel->updateType($type, $type_qty + $qty, $user);
}

    public function gainXp($xp,$user){
        $unitModel = new User();
        $units = $unitModel->getUnits($user);
        $unitModel->updateType('xp', $xp + $units->xp, $user);
    }

    public function mine()
    {
        $user = \Illuminate\Support\Facades\Input::get("user");
        $unitModel = new User();
        $coins = $unitModel->getCurrentCoins($user);

        if ($coins >= 100) {
            $unitModel->updateType('coins', $coins - 100, $user);
            $unitModel->mining($user);
        }
    }

    public function gather()
    {
        $user = \Illuminate\Support\Facades\Input::get("user");
        $type = \Illuminate\Support\Facades\Input::get("type");
        $unitModel = new User();
        $coins = $unitModel->getCurrentCoins($user);

        if ($coins >= 100) {
            $unitModel->updateType('coin', $coins - 100, $user);
            if ($type == "rock")
                $type = "miner1";
            if ($type == "wood")
                $type = "miner2";
            if ($type == "grass")
                $type = "miner3";
            $unitModel->gather($type, $user);
        }
    }

    public function buy()
    {
        $unitModel = new User();
        $user = \Illuminate\Support\Facades\Input::get("user");
        $type = \Illuminate\Support\Facades\Input::get("type");
        $qty = \Illuminate\Support\Facades\Input::get("qty");
        $trade = new trades();
        $coins = $unitModel->getCurrentCoins($user);
        $cost = $trade->getBuy($type) * $qty;
        $units = $unitModel->getUnits($user);
        $rock = $units->$type;
        if ($coins >= $cost) {
            $unitModel->updateType('coin', $coins - $cost, $user);
            $unitModel->updateType($type, $rock + $qty, $user);
        }
    }

    public function sell()
    {
        $unitModel = new User();
        $user = \Illuminate\Support\Facades\Input::get("user");
        $type = \Illuminate\Support\Facades\Input::get("type");
        $qty = \Illuminate\Support\Facades\Input::get("qty");
        $trade = new trades();
        $coins = $unitModel->getCurrentCoins($user);
        $cost = $trade->getSell($type) * $qty;
        $units = $unitModel->getUnits($user);
        $rock = $units->$type;

        if ($rock >= $qty) {
            $unitModel->updateType('coin', $coins + $cost, $user);
            $unitModel->updateType($type, $rock - $qty, $user);
        }
    }

}

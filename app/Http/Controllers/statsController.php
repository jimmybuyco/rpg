<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class statsController extends Controller
{
    public function getStats()
    {

//        $user=Auth::user()->id;
        $user=\Illuminate\Support\Facades\Input::get("user");
        $unitModel = new User();
        $units = new unitsController();
        //$miners = $unitModel->geMinersCount($user);
        $unit_counts = $unitModel->getUnits($user);
        $coins = $unit_counts->coin;
       // $coins = $units->updateCoins($miners, $coins, $user);

        $rock = $unit_counts->rock;
        $wood = $unit_counts->wood;
        $grass = $unit_counts->grass;
        $name = $unit_counts->name;
        $gold = $unit_counts->gold;
        $exp = $unit_counts->xp;
        $hp = $unit_counts->hp;
        $sp = $unit_counts->sp;
        $sp_ctr = $unit_counts->sp_ctr;
        $def = $unit_counts->defence;
        $miners1= $unit_counts->miner1;
        $miners2_box= $unit_counts->miner2_box;
        $miners3_box= $unit_counts->miner3_box;
        $miners1_box= $unit_counts->miner1_box;
        $miners2= $unit_counts->miner2;
        $miners3= $unit_counts->miner3;
        $ranking = $unitModel->getRanking($user);
        $message = null;
        $level = floor($exp/1800)+1;
        $exp=$exp%1800;

//        if ($miners1 == -1) {
//            $message = $units->getMineRewards("rock",$user);
//        }
//        if ($miners2 == -1) {
//            $message = $units->getMineRewards("wood",$user);
//        }
//        if ($miners3 == -1) {
//            $message = $units->getMineRewards("grass",$user);
//        }
        $data = array(
            'id'=>$user,
            'coins' =>$coins ,
            'hp'=>$hp,
            'sp'=>$sp,
            'sp_ctr'=>$sp_ctr,
            'def'=>$def,
            'name' =>$name ,
            'miner1' => $miners1,
            'miner2' => $miners2,
            'miner3' => $miners3,
            'miner1_box'=>$miners1_box,
            'miner2_box'=>$miners2_box,
            'miner3_box'=>$miners3_box,
            'rock' => $rock,
            'grass' => $grass,
            'wood' => $wood,
            'gold' => $gold,
            'ranking' => $ranking,
            'message' => $message,
            'xp' => $exp,
            'level' => $level
        );
        return $data;
    }


}

<?php

namespace App\Http\Controllers;

use App\messageboard;
use Illuminate\Support\Facades\DB;
use App\achivements;
use App\stats;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class statsController extends Controller
{
    public function getStats()
    {
        $user = Auth::user()->id;
        $unitModel = new User();
        $unit_counts = $unitModel->getUnits($user);
        $coins = $unit_counts->coin;
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
        $miners1 = $unit_counts->miner1;
        $miners2_box = $unit_counts->miner2_box;
        $miners3_box = $unit_counts->miner3_box;
        $miners1_box = $unit_counts->miner1_box;
        $miners2 = $unit_counts->miner2;
        $miners3 = $unit_counts->miner3;
        $ranking = $unitModel->getRanking($user);
        $achive = $this->getAchivements($user);
        $items = $unitModel->getItems($user);

        $message = null;
        $level = floor($exp / 1800) + 1;
        $exp = $exp % 1800;


        $msg = new messageboard();

        $data = array(
            'id' => $user,
            'coins' => $coins,
            'hp' => $hp,
            'sp' => $sp,
            'sp_ctr' => $sp_ctr,
            'def' => $def,
            'name' => $name,
            'miner1' => $miners1,
            'miner2' => $miners2,
            'miner3' => $miners3,
            'miner1_box' => $miners1_box,
            'miner2_box' => $miners2_box,
            'miner3_box' => $miners3_box,
            'rock' => $rock,
            'grass' => $grass,
            'wood' => $wood,
            'gold' => $gold,
            'ranking' => $ranking,
            'achive' => $achive,
            'items' => $items,
            'message' => $msg->getMessageBoard(),
            'xp' => $exp,
            'level' => $level,

        );
        return $data;
    }

    public function getAchivements($user)
    {
        $this->checkAchivements($user);
        $achive = new achivements();
        return $achive->myAchivements($user);
    }

    public function checkAchivements($user)
    {
        $achive = new achivements();
        $stats = new stats();

        $user_stats = $stats->getStats($user);
        $list = $achive->achivementsList($user);
        foreach ($list as $e) {
            switch ($e->title) {
                case "First Blood":
                    if ($user_stats->kill > 0) {
                        $achive->setAchivementEnable($user, $e->id);
                    }
                    break;
                case "Rock star":
                    if ($user_stats->rock > 1000) {
                        $achive->setAchivementEnable($user, $e->id);
                    }
                    break;
                case "Illegal Logger":
                    if ($user_stats->wood > 1000) {
                        $achive->setAchivementEnable($user, $e->id);
                    }
                    break;
                case "Grazer":
                    if ($user_stats->grass > 1000) {
                        $achive->setAchivementEnable($user, $e->id);
                    }
                    break;
            }
        };
    }


}

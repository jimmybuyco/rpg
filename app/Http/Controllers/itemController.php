<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class itemController extends Controller
{
    public function useItem()
    {

//        $user=Auth::user()->id;
        $user=\Illuminate\Support\Facades\Input::get("user");
        $type=\Illuminate\Support\Facades\Input::get("type");
        $unitModel = new User();

        $user_units= $unitModel->getUnits($user);

        switch($type) {
            case "potion":
                if ($user_units->coin >= 100 && $user_units->wood >= 30 && $user_units->grass >= 30) {
                    $unitModel->updateType('hp', ($user_units->hp + 20) > 100 ? 100 : $user_units->hp + 20, $user);
                    $unitModel->updateType('coin', $user_units->coin - 100, $user);
                    $unitModel->updateType('wood', $user_units->wood - 30, $user);
                    $unitModel->updateType('grass', $user_units->grass - 30, $user);
                }


                break;
            case "Tue":
                echo "Today is Tuesday. Buy some food.";
                break;
            case "Wed":
                echo "Today is Wednesday. Visit a doctor.";
                break;
            case "Thu":
                echo "Today is Thursday. Repair your car.";
                break;
            case "Fri":
                echo "Today is Friday. Party tonight.";
                break;
            case "Sat":
                echo "Today is Saturday. Its movie time.";
                break;
            case "Sun":
                echo "Today is Sunday. Do some rest.";
                break;
            default:
                echo "No information available for that day.";
                break;


        }

    }





public function gainXp($xp,$user){
    $unitModel = new User();
    $units = $unitModel->getUnits($user);
    $unitModel->updateType('xp', $xp + $units->xp, $user);
}


}

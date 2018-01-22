<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class combatController extends Controller
{
    public function attack()
    {

//        $user=Auth::user()->id;
        $user=\Illuminate\Support\Facades\Input::get("user");
        $def=\Illuminate\Support\Facades\Input::get("defender");
        $unitModel = new User();




        $attacker = $unitModel->getUnits($user);

        if($attacker->sp > 0){
            $splitAtk=str_split($attacker->defence,1);
            $defender = $unitModel->getUnits($def);
            $splitDef=str_split($defender->defence,1) ;

            $atk_dmg=0;
            $def_dmg=0;

            for($x=0;$x<5;$x++){

                if($splitAtk[$x]==1 && $splitDef[$x]==2)
                    $atk_dmg++;

                print_r("atk:".$splitAtk[$x].",def:".$splitDef[$x]      .  ",attaker:".$atk_dmg.",defender:".$def_dmg);
                if($splitAtk[$x]==2 && $splitDef[$x]==3)
                    $atk_dmg++;
                if($splitAtk[$x]==3 && $splitDef[$x]==1)
                    $atk_dmg++;
//            if($splitAtk[$x]== $splitDef[$x]) {
//                $atk_dmg++;
//            }
//            print_r($splitAtk[$x]." vs ".$splitDef[$x]);
            }
            $def_dmg=5-$atk_dmg;


            $this->gainXp($atk_dmg*5,$user);
            $this->gainXp($def_dmg*5,$def);



            $unitModel->updateType('hp', ($defender->hp-$atk_dmg)<1?0:$defender->hp-$atk_dmg, $def);
            $unitModel->updateType('hp', ($attacker->hp-$def_dmg)<1?0:($attacker->hp-$def_dmg), $user);
            $unitModel->updateType('sp', $attacker->sp-1, $user);

        }




//        $message = "hello";

//        return $message;
    }





public function gainXp($xp,$user){
    $unitModel = new User();
    $units = $unitModel->getUnits($user);
    $unitModel->updateType('xp', $xp + $units->xp, $user);
}


}

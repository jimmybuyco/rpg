<?php

namespace App\Http\Controllers;

use App\messageboard;
use App\stats;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class combatController extends Controller
{
    public function attack()
    {
        $user = Auth::user()->id;
        $def = \Illuminate\Support\Facades\Input::get("defender");
        $unitModel = new User();

        $default_def = 5;
        $attacker = $unitModel->getUnits($user);

        if ($attacker->sp > 0) {
            $splitAtk = str_split($attacker->defence, 1);
            $defender = $unitModel->getUnits($def);
            $splitDef = str_split($defender->defence, 1);

            $atk_dmg = 0;
            $def_dmg = 0;

            for ($x = 0; $x < 5; $x++) {

                if ($splitAtk[$x] == 1 && $splitDef[$x] == 2)
                    $atk_dmg++;
                if ($splitAtk[$x] == 2 && $splitDef[$x] == 3)
                    $atk_dmg++;
                if ($splitAtk[$x] == 3 && $splitDef[$x] == 1)
                    $atk_dmg++;
            }

            $checkAtk = DB::table('trades')->select(DB::raw('SUM(value) as ATK'))->where('lifespan', '>', 0)
                ->where('attribute', 'ATK')->where('user', $user)->first();
            $checkDef = DB::table('trades')->select(DB::raw('SUM(value) as DEF'))->where('lifespan', '>', 0)
                ->where('attribute', 'DEF')->where('user', $def)->first();

            $def_dmg = $default_def - $atk_dmg;
            if ($checkAtk) {
                $atk_dmg += $checkAtk->ATK;
            }
            if ($checkAtk) {
                $atk_dmg -= $checkDef->DEF;
            }
            $def_dmg = $def_dmg < 0 ? 0 : $def_dmg;
            $this->gainXp($atk_dmg * 5, $user);
            $this->gainXp($def_dmg * 5, $def);

            $message = $attacker->name . " deal " . $atk_dmg . " damage to " . $defender->name . ". " . $defender->name . " deals " . $def_dmg . " to " . $attacker->name;
            $stats = new stats();

            if ($defender->hp - $atk_dmg < 1) {
                $status = $stats->getStats($user);
                $stats->updateStats($user, 'kill', $status->kill + 1);
            }
            if ($attacker->hp - $def_dmg < 1) {
                $status = $stats->getStats($def);
                $stats->updateStats($def, 'kill', $status->kill + 1);
            }

            $msg = new messageboard();
            $msg->addMessage($message);
            $unitModel->updateType('hp', ($defender->hp - $atk_dmg) < 1 ? 0 : $defender->hp - $atk_dmg, $def);
            $unitModel->updateType('hp', ($attacker->hp - $def_dmg) < 1 ? 0 : ($attacker->hp - $def_dmg), $user);
            $unitModel->updateType('sp', $attacker->sp - 1, $user);

            $data = array(

                'message' => $message,
            );
            return $data;
        }
    }

    public function gainXp($xp, $user)
    {
        $unitModel = new User();
        $units = $unitModel->getUnits($user);
        $unitModel->updateType('xp', $xp + $units->xp, $user);
    }
}

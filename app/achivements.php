<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class achivements extends Model
{
    //
    public function achivementsList($user){
        return DB::table('achivements')->where('user',$user)->where('enable',0)->get();
    }

    public function myAchivements($user){
        return DB::table('achivements')->where('user',$user)->where('enable',1)->get();
    }

    public function setAchivementEnable($user,$id){
        $val = array(
            'enable'=>1);
        return DB::table('achivements')->where('user',$user)->where('id',$id)->update($val);
    }
}

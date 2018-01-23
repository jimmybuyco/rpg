<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class stats extends Model
{
    //
    public function getStats($user){
        return DB::table('stats')->where('user',$user)->first();
    }

    public function updateStats($user,$type,$val){
        DB::table('stats')->where('user', $user)->update([$type=> $val]);
    }
}

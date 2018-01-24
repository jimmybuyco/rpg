<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class messageboard extends Model
{
    //
    public function addMessage($message){
        $val = array('message'=>$message);
        DB::table('messageboard')->insert($val);
    }

    public function getMessageBoard(){
        return DB::table('messageboard')->orderBy('id', 'desc')->take(10)->get();
    }
}

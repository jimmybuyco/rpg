<?php

namespace App\Http\Controllers;
use App\achivements;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


class Controller extends BaseController
{
//    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function viewUser($id){
    $achivement = new achivements();
        $user = new User();
        $user_details = $user->getUnits($id);

        $data=array(
          'id'=>$user_details->id,
            'name'=>$user_details->name,
            'achivements'=>$achivement->myAchivements($id)

        );

        return View::make("view_user")->with($data);
//        return view('view_user',$data);
    }
}

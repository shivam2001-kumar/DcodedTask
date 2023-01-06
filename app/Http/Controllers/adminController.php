<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\registrationModel;

class adminController extends Controller
{
    //

    public function userlist(){
      $userdata=registrationModel::where('type','user')->get();
      return $userdata;
    }

    public function  userview(){
        $userdata=registrationModel::where('type','user')->get();
        return view('admin.userlist',compact('userdata'));
    }


    public function allblog()
    {
        $userdata=blog::where('type','user')->get();
        return view('admin.allblog',compact('userdata'));
    }

    public function userstatus($id){
        $state=registrationModel::find($id);
        if($state->status==1){
            registrationModel::find($id)->update([
                'status'=>0,
            ]);
        }elseif($state->status==0){
            registrationModel::find($id)->update([
                'status'=>1,
            ]);
        }

        $userdata=registrationModel::where('type','user')->get();
        return view('admin.userlist',compact('userdata'));
    }
}

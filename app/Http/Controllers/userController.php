<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\registrationModel;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Mail\userMail;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{

    public function userdashboard(){
        return view('admin.dashboard');
    }

    public function userdata(Request $request){
        $validatin=$request->validate([
            'name'=>'required',
            'dob'=>'required',
            'profile'=>'required',
            'mobile'=>'required|min:10',
            'email'=>'required|email',
            'password'=>'required|min:8|alpha_num',
            'g'=>'required',
        ]);
        $fileName = 'Img'.time().'.'.$request->profile->extension();

        $request->profile->move(public_path('upload'), $fileName);
        $pwd=$request->password;
       $data= registrationModel::create([

            'name'=>$request->name,
            'dob'=>$request->dob,
            'image'=>$fileName,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'gender'=>$request->g,
            'type'=>'user',
        ]);

        if($data->save()){
            Mail::to($request->email)->send(new userMail($data,$pwd));
            return view('login')->with('success', 'Registration successfully  !');
        }
        else{
           return redirect('/');
        }
    }

    // login code

    public function logincode(Request $request){

        $request->validate([
            'email'=>'required|exists:registration_models,email',
            'password'=>'required'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password,],$request->remeber?true:false)){
                $state=registrationModel::where('email',$request->email)->first();

                if($state->status == 1){
                    if($state->type == 'user'){
                        return redirect()->route('userDashboard')->with('success', 'Welcome to Dashboard !');
                    }
                    else{
                        return redirect()->route('userDashboard')->with('success', 'Welcome to Admin Dashboard !');
                    }
            }
            else{
            return redirect()->back()->with('danger','Your Credentials Wrong !');
            }
        }else{
            return redirect()->back()->with('danger','Your Credentials Wrong !');
        }

    }

    ///



}

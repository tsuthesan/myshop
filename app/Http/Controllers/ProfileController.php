<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Profile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    //
    public function profile(){
        return view('profiles.profile');
    }
    public function addProfile(Request $request){
       $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'profile_pic' => 'required'
       ]);

        $profiles = new Profile;
        $profiles->name = $request->input('name');
        $profiles->user_id = Auth::user()->id;
        $profiles->designation = $request->input('designation');
        if(Input::hasFile('profile_pic')){
                $file = Input::file('profile_pic');
$file-> move(public_path().'/uploads/', $file->getClientOriginalName());
$url = URL::to("/") .'/uploads/'. $file->getClientOriginalName();

        }
        $profiles->profile_pic = $url;
        $profiles->save();
        return redirect('/home')->with('response','Profile Added Successfully');
       // $profiles->profile_pic = $request->input('profile_pic');
     //   $profiles->user_id = Auth::user()->id;
//        return Auth::user()->id;
//        exit();



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id){
        $profile = User::join('profile','users.id','=','profile.userid')->find($id);
        return view('profile',['profile'=>$profile]);
    }

    public function setting(){
        $id = Auth::user()->id;
        $profile = User::join('profile','users.id','=','profile.userid')->find($id);
        return view('setting',['profile'=>$profile]);
    }

    public function update(Request $request){
        $id = Auth::user()->id;

        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        $profile = Profile::where('userid',$id)->first();

        $profile->fill([
            'sex' => $request->sex,
            'from'=> $request->from,
            'old' => $request->old,
            'job' => $request->job,
            'profile' => $request->profile,
        ]);

        $profile->save();

        $profile = User::join('profile','users.id','=','profile.userid')->find($id);

        return view('setting',['profile'=>$profile]);
    }
}

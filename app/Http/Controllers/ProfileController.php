<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('profile',['user'=>$user]);
    }

    public function setting(){
        $id = Auth::id();
        $user = User::find($id);
        return view('setting',['user'=>$user]);
    }

    public function update(Request $request){
        $id = Auth::id();

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
        ])->save();

        $user = User::find($id);

        return view('setting',['user'=>$user]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /*********************************************
     * Show Profile
    **********************************************/
    public function show($id)
    {
        $user = User::find($id);
        return view('profile',['user'=>$user]);
    }
    /*********************************************
     * Show Profile Setting
    **********************************************/
    public function setting()
    {
        $user = User::find(Auth::id());
        return view('setting',['user'=>$user]);
    }
    /*********************************************
     * Update Profile
    **********************************************/
    public function update(Request $request)
    {
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
            'profile' => Crypt::encryptString($request->profile),
        ])->save();

        return $this->setting();
    }
}

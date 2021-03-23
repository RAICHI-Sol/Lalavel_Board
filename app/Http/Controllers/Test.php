<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Test extends Controller
{
    public function index()
    {
        if(Auth::check()){
           return view('home');
        }
        else{
           return view('home_temp');
        }
    }

    public function show(){
        if(Auth::user() !=NULL){
            $item = User::find(Auth::user()->id);
            return view('show',['item' => $item]);
        }
        else{
            return view('Auth/login');
        }
    }

    public function create(Request $request){
        $newAccount = new User();
        $newAccount->name  = $request->name;
        $newAccount->email = $request->email;
        $newAccount->password = Hash::make($request->password);
        $newAccount->save();
        $name = $newAccount->name;
        return view('create_success',['name' => $name]);
    }

    public function login(Request $request){
        if($item = User::where('email',$request->email)->first()):
            if(Hash::check($request->password,$item->password)):
                Auth::attempt(['email'=>$item->email,'password'=>$request->password]);
            endif;
        endif;
    }
}

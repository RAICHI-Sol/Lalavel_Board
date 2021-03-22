<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class Test extends Controller
{
    public function show($id){
        $item = Account::find($id);
        return view('show',['item' => $item]);
    }

    public function create(Request $request){
        $newAccount = new Account();
        $newAccount->name    = $request->name;
        $newAccount->user_id = $request->user_id;
        $newAccount->password = $request->password;
        $newAccount->save();
        $name = $newAccount->name;
        return view('create_success',['name' => $name]);
    }
    
    public function login(Request $request){
        if($item = Account::where('user_id',$request->name)->
        where('password',$request->password)->first()):
               return view('show',['item' => $item]);
        else:
            return view('login');
        endif;
    }
}

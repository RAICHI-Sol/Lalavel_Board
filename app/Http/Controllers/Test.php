<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Board;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;


class Test extends Controller
{
    public function index(Request $request)
    {
        $count = Board::count();
        $boards = BoardController::boards_DB($request->page);

        return view('home',[
            'boards' => $boards,
            'title'  => 'Home',
            'count'  => $count,
            'search' => 'none',
        ]);
    }

    public function show(){
        if(Auth::check()){
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

}

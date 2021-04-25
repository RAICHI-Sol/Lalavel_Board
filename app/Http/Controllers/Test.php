<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Board;
use Illuminate\Support\Facades\Hash;


class Test extends Controller
{
    public static function check_return(){
        if(Auth::check()):
            return 'home';
        else:
            return 'home_temp';
        endif;
    }

    public function index(Request $request)
    {
        $count = Board::count();
        $boards = BoardController::boards_DB($request->page);
        $home = Test::check_return();

        return view($home,[
            'boards' => $boards,
            'title'  => 'Home',
            'count'  => $count,
            'search' => 'none',
        ]);
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

}

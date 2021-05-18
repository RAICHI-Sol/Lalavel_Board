<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Board;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*********************************************
     * Return view
    **********************************************/
    public function return_view($boards,$title,$count,$search)
    {
        return view('home',[
            'boards' => $boards,
            'title'  => $title,
            'count'  => $count,
            'search' => $search,
        ]);
    }
    /*********************************************
     * Create User
    **********************************************/
    public function check(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'password' =>'required|string|alpha_num|min:8|max:16',
        ]);

        if($validator->fails()){
            return redirect('/create')
            ->withErrors($validator)
            ->withInput();
        }
        else{
            return $this->create($request);
        }

    }
    public function create(Request $request)
    {
        $user = new User();
        $user->fill([
            'name'  => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
        ])->save();

        $profile = new Profile();

        $profile->create([
            'userid'  => $user->id,
            'profile' => Crypt::encryptString('よろしくお願いします'),
        ]);

        return view('success',[
            'title'=> '新規アカウント作成',
            'name' => $user->name,
            'text' => '作成'
        ]);
    }
    /*********************************************
     * Destroy User
    **********************************************/
    public function destroy()
    {
        $name   = Auth::user()->name;
        $userid = Auth::id();
        $boards = Board::where('create_userid',$userid)->get();
        for($i = 0;$i < $boards->count();$i++)
        {
            BoardController::delete_board($boards[$i]->id,$boards[$i]);
        }
        Profile::where('userid',$userid)->delete();
        User::find($userid)->delete();

        return view('success',[
            'title'=>'アカウント削除',
            'name' => $name,
            'text' => '削除'
        ]);
    }
}

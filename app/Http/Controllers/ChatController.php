<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\Board;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Crypt;
use DateTime;

class ChatController extends Controller
{
    public function show($id)
    {
        if(Auth::check()){
            $myid  = Auth::id();
            $board = Board::find($id);

            $chats = Chat::where('boardid',$id)->
            where(function($query) use($myid){
                $query->where('from',$myid)
                      ->orwhere('to',$myid);
            })->get();
    
            return view('chat',['chats'=>$chats,'board'=>$board]);
        }
        else{
            return view('Auth/login');
        }
    }
    
    public function add($id,Request $request){
        $myid  = Auth::id();
        $board = Board::find($id);
        $target = $request->target;

        $newmessage = new Chat();
        $newmessage->create([
            'boardid'=>$id,
            'from'=>$myid,
            'to'=>$target,
            'message'=>Crypt::encryptString($request->message),
            'create'=>new DateTime()
        ]);
        
        $chats = Chat::where('boardid',$id)->
        where(function($query) use($myid){
            $query->where('from',$myid)
                  ->orwhere('to',$myid);
        })->get();

        return view('chat',['chats'=>$chats,'board'=>$board]);
    }
}

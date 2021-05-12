<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Board;
use Illuminate\Support\Facades\Crypt;
use DateTime;

class ChatController extends Controller
{
    /*********************************************
     * return_view
    **********************************************/
    public function return_view($id,$myid,$board)
    {
        $chats = Chat::where('boardid',$id)->
        where(function($query) use($myid){
            $query->where('from',$myid)
                  ->orwhere('to',$myid);
        })->get();

        return view('chat',['chats'=>$chats,'board'=>$board]);
    }
    /*********************************************
     * Show Chat
    **********************************************/
    public function show($id)
    {
        $myid  = Auth::id();
        $board = Board::find($id);
        return $this->return_view($id,$myid,$board);
    }
    
    /*********************************************
     * Add Chat Comment
    **********************************************/
    public function add($id,Request $request)
    {
        $myid  = Auth::id();
        $board = Board::find($id);

        $newmessage = new Chat();
        $newmessage->create([
            'boardid'=>$id,
            'from'=>$myid,
            'to'=>$request->target,
            'message'=>Crypt::encryptString($request->message),
            'create'=>new DateTime()
        ]);
        
        return $this->return_view($id,$myid,$board);
    }
}

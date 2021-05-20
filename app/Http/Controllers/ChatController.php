<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\ChatEntry;
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
        $userid =  $board->create_userid;
        $chats = Chat::where('boardid',$id)->
        where(function($query) use($myid,$userid){
            $query->where([['from',$myid],['to',$userid]])
                  ->orwhere([['to',$myid],['from',$userid]]);
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

        if($this->entryCheck($myid,$id)==null){
            $this->entryAdd($myid,$id);
        }

        $newmessage = new Chat();
        $newmessage->fill([
            'boardid'=>$id,
            'from'=>$myid,
            'to'=>$request->target,
            'message'=>Crypt::encryptString($request->message),
            'create'=>new DateTime()
        ])->save();
        event(new ChatEvent($newmessage));
        
        return $this->return_view($id,$myid,$board);
    }
    /*********************************************
     * ChatEntry Check
    **********************************************/
    public function entryCheck($userid,$boardid)
    {
        return ChatEntry::where('boardid',$boardid)
               ->where('userid',$userid)->first();
    }
    /*********************************************
     * ChatEntry Add
    **********************************************/
    public function entryAdd($userid,$boardid){
        $newmessage = new ChatEntry();
        $newmessage->create([
            'boardid'=>$boardid,
            'userid'=>$userid,
            'entry'=>new DateTime()
        ]);
    }
}

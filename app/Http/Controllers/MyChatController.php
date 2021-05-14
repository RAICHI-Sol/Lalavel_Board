<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\ChatEntry;
use Illuminate\Support\Facades\Crypt;
use DateTime;

class MyChatController extends Controller
{
    /*********************************************
     * return_view(User Side)
    **********************************************/
    public function return_view($id,$myid,$num = 0)
    {
        $entrys = ChatEntry::where('boardid',$id)->get();

        $other = ($num == 0)?$entrys->first():$entrys->where('userid',$num)->first();

        if($other != null){
            $otherid = $other->userid;
            $chats  = Chat::where('boardid',$id)->
            where(function($query) use($myid,$otherid ){
                $query->where([['from',$myid],['to',$otherid]])
                      ->orwhere([['to',$myid],['from',$otherid]]);
            })->get();

            return view('mychat',[
                'entrys'=>$entrys,
                'chats'=>$chats,
                'other'=>$other
            ]);
        }
        else{
            return view('mychat',[
                'entrys'=>$entrys,
                'chats'=>null,
                'other'=>null
            ]);
        }
    }
    /*********************************************
     * Show Chat(User Side)
    **********************************************/
    public function show($id,Request $request)
    {
        $myid  = Auth::id();
        $target = ($request != null)?$request->target:0;

        return $this->return_view($id,$myid,$target);
    }

    /*********************************************
     * Add Chat Comment(User Side)
    **********************************************/
    public function add($id,Request $request)
    {
        $myid  = Auth::id();

        $newmessage = new Chat();
        $newmessage->create([
            'boardid'=>$id,
            'from'=>$myid,
            'to'=>$request->target,
            'message'=>Crypt::encryptString($request->message),
            'create'=>new DateTime()
        ]);

        return $this->return_view($id,$myid,$request->target);
    }
}

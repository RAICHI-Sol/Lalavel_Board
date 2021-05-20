<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Models\BoardComment;
use Illuminate\Support\Facades\Crypt;
use App\Events\PusherEvent;

class BoardController extends Controller
{
    /*********************************************
     * Search Board
    **********************************************/
    public function boards_DB($offset = 0)
    {
        return Board::latest()->offset($offset * 5)
        ->limit(5)->get();   
    }
    /*********************************************
     * Search like Board
    **********************************************/
    public function boards_DB_search($search,$offset = 0)
    {
        return Board::where('board.board_name','like','%'.$search.'%')
        ->latest()->offset($offset * 5)
        ->limit(5)->get();   
    }
    /*********************************************
     * Delte Board(static)
    **********************************************/
    public static function delete_board($id,$board)
    {
        BoardComment::where('board_id',$id)->delete();
        $board->delete();
    }

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
     * Search boards
    **********************************************/
    public function search(Request $request)
    {
        $count = Board::where('board.board_name','like','%'.$request->search.'%')->count();
        $boards = $this->boards_DB_search($request->search,$request->page);

        $title = '検索結果('.$count.'件)';

        return $this->return_view($boards,$title,$count,$request->search);
    }

    /*********************************************
     * Show home
    **********************************************/
    public function index(Request $request)
    {
        $count = Board::count();
        $boards = $this->boards_DB($request->page);

        return $this->return_view($boards,'Home',$count,'none');
    }

    /*********************************************
     * Show boardComment
    **********************************************/
    public function show($id)
    {
        $boards = Board::find($id);
        if($boards != null){
            return view('board',['boards' => $boards]);
        }
        else{
            return view('not');
        }
    }

    /*********************************************
     * Create board
    **********************************************/
    public function create(Request $request)
    {
        $newBoard = new Board();
        $newBoard->fill([
            'board_name'=>$request->board_name,
            'create_userid'=>Auth::id(),
            'watcher'=>0,
        ])->save();

        $newBoardComment = new BoardComment();
        $newBoardComment->fill([
            'board_id' =>$newBoard->id,
            'comment'  =>Crypt::encryptString($request->comment),
            'tag_id'   =>1,
        ])->save();

        event(new PusherEvent($newBoard));

        $count = Board::count();
        $boards = $this->boards_DB();

        return $this->return_view($boards,"Home",$count,'none');
    }
    /*********************************************
     * Delete board
    **********************************************/
    public function update(Request $request)
    {
        $newBoard = Board::find($request->id);
        $newBoard->fill([
            'board_name'=>$request->name,
        ])->save();

        $newBoardComment = BoardComment::where('board_id',$request->id)->first();
        $newBoardComment->fill([
            'comment'  =>Crypt::encryptString($request->comment),
        ])->save();

        $count = Board::count();
        $boards = $this->boards_DB();

        return $this->return_view($boards,"Home",$count,'none');
    }
    /*********************************************
     * Delete board
    **********************************************/
    public function delete(Request $request)
    {
        $board = Board::find($request->id);
        $this->delete_board($request->id,$board);

        $count = Board::count();
        $boards = $this->boards_DB();

        return $this->return_view($boards,"Home",$count,'none');
    }
}
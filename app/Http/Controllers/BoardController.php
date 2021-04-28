<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Test;
use App\Models\BoardComment;

class BoardController extends Controller
{
    public static function boards_DB($offset = 0){
        return Board::select('board.id','board.created_at','users.name','board.create_userid',
        'board.board_name','board.watcher')
        ->join('users','users.id','=','board.create_userid')
        ->latest()->offset($offset * 5)
        ->limit(5)->get();   
    }

    public static function boards_DB_search($search,$offset = 0){
        return Board::select('board.id','board.created_at','users.name','board.create_userid',
        'board.board_name','board.watcher')
        ->join('users','users.id','=','board.create_userid')
        ->where('board.board_name','like','%'.$search.'%')
        ->latest()->offset($offset * 5)
        ->limit(5)->get();   
    }

    public function search(Request $request){
        
        $count = Board::where('board.board_name','like','%'.$request->search.'%')->count();
        
        $boards = BoardController::boards_DB_search($request->search,$request->page);

        return view('home',[
            'boards' => $boards,
            'title'  => '検索結果('.$count.'件)',
            'count'  => $count,
            'search' => $request->search,
        ]);
    }

    public function show($id){

        $boards = Board::select('board.id','board.created_at','users.name','board.create_userid',
        'board.board_name','board_comment.comment')
        ->join('users','users.id','=','board.create_userid')
        ->join('board_comment','board_comment.board_id','=','board.id')
        ->find($id);

        return view('board',[
            'boards' => $boards,
        ]);
    }

    public function create(Request $request){
        $newBoard = new Board();
        $newBoard->board_name    = $request->board_name;
        $newBoard->create_userid = Auth::user()->id;
        $newBoard->watcher = 0;
        $newBoard->save();

        $newBoardComment = new BoardComment();
        $newBoardComment->create([
            'board_id' =>$newBoard->id,
            'comment'  =>$request->comment,
            'tag_id'   =>1,
        ]);

        $count = Board::count();

        $boards = BoardController::boards_DB();

        return view('home',[
            'boards' => $boards,
            'title'  => 'Home',
            'count'  => $count,
            'search' => 'none',
        ]);
    }
}
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
        return Board::latest()->offset($offset * 5)
        ->limit(5)->get();   
    }

    public static function boards_DB_search($search,$offset = 0){
        return Board::where('board.board_name','like','%'.$search.'%')
        ->latest()->offset($offset * 5)
        ->limit(5)->get();   
    }

    public function search(Request $request){
        
        $count = Board::where('board.board_name','like','%'.$request->search.'%')->count();
        
        $boards = $this->boards_DB_search($request->search,$request->page);

        return view('home',[
            'boards' => $boards,
            'title'  => '検索結果('.$count.'件)',
            'count'  => $count,
            'search' => $request->search,
        ]);
    }

    public function show($id){
        $boards = Board::find($id);
        return view('board',['boards' => $boards,]);
    }

    public function create(Request $request){
        $newBoard = new Board();
        $newBoard->fill([
            'board_name'=>$request->board_name,
            'create_userid'=>Auth::id(),
            'watcher'=>0,
        ])->save();

        $newBoardComment = new BoardComment();
        $newBoardComment->create([
            'board_id' =>$newBoard->id,
            'comment'  =>$request->comment,
            'tag_id'   =>1,
        ]);

        $count = Board::count();

        $boards = $this->boards_DB();

        return view('home',[
            'boards' => $boards,
            'title'  => 'Home',
            'count'  => $count,
            'search' => 'none',
        ]);
    }
}
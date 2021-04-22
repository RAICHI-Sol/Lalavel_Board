<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        DB::table('board')->truncate();

        //初期データ用意
        $boards = [
            ['board_name'=>'トムとジェリーでおすすめの回教えてww',
            'create_userid'=>2,
            'watcher'=>0],
            ['board_name'=>'【急募】彼氏募集!',
            'create_userid'=>3,
            'watcher'=>10],
        ];
        
        //投稿
        foreach($boards as $board){
            \App\Models\Board::create($board);
        }
    }

}

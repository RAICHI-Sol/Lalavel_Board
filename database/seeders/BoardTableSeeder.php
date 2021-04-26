<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Board;

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
        Board::truncate();

        //初期データ用意
        $boards = [
            ['board_name'=>'【相方募集】漫才ができる方',
            'create_userid'=>2,
            'watcher'=>0],
            ['board_name'=>'トムとジェリーでおすすめの回教えてww',
            'create_userid'=>7,
            'watcher'=>0],
            ['board_name'=>'【急募】彼氏募集!',
            'create_userid'=>3,
            'watcher'=>0],
        ];
        
        //投稿
        foreach($boards as $board){
            Board::create($board);
        }
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\BoardComment;
use Illuminate\Support\Facades\Crypt;

class BoardCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        BoardComment::truncate();

        //初期データ用意
        $boards = [
            ['board_id'=>1,
            'comment'=>
            Crypt::encryptString('現在、本格的に漫才に打ち込むため、相方を募集しております。以下に詳細を記載致します。【募集ポジション】ツッコミ担当【条件】●必須…大阪在中の方●歓迎…漫才・コントの経験がある方'),
            'tag_id'=>0],
            ['board_id'=>2,
            'comment'=>Crypt::encryptString('彼氏募集しています！！'),
            'tag_id'=>0],
        ];
        
        //投稿
        foreach($boards as $board){
            BoardComment::create($board);
        }
    }
}

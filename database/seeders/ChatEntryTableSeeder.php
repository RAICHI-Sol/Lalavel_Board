<?php

namespace Database\Seeders;

use App\Models\ChatEntry;
use Illuminate\Database\Seeder;

class ChatEntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        ChatEntry::truncate();

        //初期データ用意
        $boards = [
            ['boardid'=>3,
            'userid'=>2,],
            ['boardid'=>5,
            'userid'=>2,],
            ['boardid'=>5,
            'userid'=>3,]
        ];

        //投稿
        foreach($boards as $board){
            ChatEntry::create($board);
        }
    }
}

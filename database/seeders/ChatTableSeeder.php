<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;
use Illuminate\Support\Facades\Crypt;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テーブルのクリア
        Chat::truncate();

        //初期データ用意
        $boards = [
            ['boardid'=>3,
            'from'=>2,
            'to'=>3,
            'message'=>Crypt::encryptString('初めまして、こんにちは')],
            ['boardid'=>3,
            'from'=>3,
            'to'=>2,
            'message'=>Crypt::encryptString('こんにちは!!')],
        ];

        //投稿
        foreach($boards as $board){
            Chat::create($board);
        }
    }
}

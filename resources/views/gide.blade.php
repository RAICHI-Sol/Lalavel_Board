@extends('layouts/layout_home')

@section("title",'このサイトについて')

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('home_get') }}">ホーム</a>
    <a href = "{{ route('gide') }}">このサイトについて</a>
</div>
@endsection

@section('main')
<div class = "boards">
    <h1>このサイトについて</h1>
    <h3>【初めに】</h3>
    <p class = "gide">
        本サイトは、<b>相方・メンバー募集、個人イベントの応募</b>に特化した掲示板を目指し、
        開発を進めております。<br>
        現在実装している機能は以下の通りです。今後も随時機能を追加していきます。
    </p>
    <div class = "gide">
        <ul>
            <li>アカウント作成・削除機能</li>
            <li>ログイン・ログアウト機能</li>
            <li>掲示板の投稿・検索・閲覧</li>
            <li>プロフィールの追加・編集</li>
        </ul>
    </div>
    <h3>【担当フェーズ】</h3>
    <div class = "gide">
        <ul>
            <li>ホームページのレイアウト・デザインの作成</li>
            <li>コーディング(フロントエンド・バックエンド両方)</li>
        </ul>
    </div>
    <h3>【開発言語】</h3>
    <div class = "gide">
        <ul>
            <li><b>フロントエンド：</b>HTML,Javascript,CSS</li>
            <li><b>バックエンド　：</b>PHP</li>
            <li><b>データベース　：</b>MySQL</li>
            <li><b>フレームワーク：</b>Laravel</li>
            <li><b>バージョン管理：</b>Git</li>
        </ul>
    </div>
    <h3>【開発環境】</h3>
    <div class = "gide">
        <ul>
            <li><b>OS：</b>Windows</li>
            <li><b>統合開発環境：</b>Visual Studio Code</li>
            <li><b>ローカル動作環境：</b>xampp</li>
        </ul>
    </div>
</div>
@endsection
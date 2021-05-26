@extends('layouts/layout_home')

@section("title",'このサイトについて')

@section('menu')
    @include('components.menu')
@endsection

@section('main')
<div class = "boards" id = "first">
    <h1>このサイトについて</h1>
    <h3>初めに</h3>
    <p class = "gide_text">
        本サイトは、<b>相方・メンバー募集、個人イベントの応募</b>に特化した掲示板を目指し、<br>
        開発を進めております。<br>
        現在実装している機能は以下の通りです。今後も随時機能を追加していきます。
    </p>
    <div class = "gide" id = "phase">
        <ul>
            <li>アカウント作成・削除機能</li>
            <li>ログイン・ログアウト機能</li>
            <li>掲示板の投稿・編集・削除</li>
            <li>プロフィールの追加・編集</li>
            <li>チャット機能の実装</li>
        </ul>
    </div>
    <h3>担当フェーズ</h3>
    <div class = "gide" id = "develop1">
        <ul>
            <li>ホームページのレイアウト・デザインの作成</li>
            <li>コーディング(フロントエンド・バックエンド両方)</li>
        </ul>
    </div>
    <h3>開発言語</h3>
    <div class = "gide" id = "develop2">
        <ul>
            <li><b>フロントエンド：</b>HTML,Javascript,CSS</li>
            <li><b>バックエンド　：</b>PHP</li>
            <li><b>データベース　：</b>MySQL</li>
            <li><b>フレームワーク：</b>Laravel</li>
            <li><b>バージョン管理：</b>Git</li>
        </ul>
    </div>
    <h3 id = "appeal">開発環境</h3>
    <div class = "gide">
        <ul>
            <li><b>OS：</b>Windows</li>
            <li><b>統合開発環境：</b>Visual Studio Code</li>
            <li><b>ローカル動作環境：</b>xampp</li>
            <li><b>PaaS：</b>heroku</li>
        </ul>
    </div>
    <h3>アピールポイント</h3>
    <div class = "gide">
        <b>【セキュリティ面】</b>
        <ul>
            <li>
                Laravelでの実装を行い、CSRF,XSSなどのWebアプリケーションの脆弱性にも<br>
                対策できるよう設計しました。
            </li>
            <br>
            <li>
                フォームで記述したメッセージを全て暗号化した上で送信し、情報の漏洩を<br>
                防げるように設計しました。
            </li>
        </ul>
        <hr>
        <b>【技術面】</b>
        <ul>
            <li>Ajaxとpusherを用いて、リアルタイムでメッセージが送受信できる<br>チャット機能を実装しました。</li>
            <ul class = "annotation" id ="video">
                <li><b>Ajax</b>　・・・非同期でJavaScriptとサーバー間の通信を行う手法</li>
                <li><b>pusher</b>・・・WebSocketを用いてリアルタイム双方向通信を実現できるAPI</li>
            </ul>
        </ul>
    </div>
    <h3>補足動画</h3>
    <div class = "gide">
        <b>●チャット機能(動画)</b><br>
        <video src="{{secure_asset("video.mp4")}}" controls playinline></video>
    </div>
</div>
@endsection

@section('contents')
    <div class = "contents">
        <h1>contents</h1>
        <a href = "#first">●初めに</a>
        <a href = "#phase">●担当フェーズ</a>
        <a href = "#develop1">●開発言語</a>
        <a href = "#develop2">●開発環境</a>
        <a href = "#appeal">●アピールポイント</a>
        <a href = "#video">●補足動画</a>
    </div>
@endsection
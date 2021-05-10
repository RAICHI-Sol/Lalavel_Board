@extends('layouts/layout_home')

@section("title",$user->name.'さんのプロフィール')

@section('main')
<div class = "profile">
    <h1>Profile</h1>
    <article class = "besic">
        <div class = "icon"></div>
        <div class = "text">
            @php
                echo '<p><b>名前</b>：'.$user->name.'</p>';
                if($user->profile->sex !=NULL)  echo '<p><b>性別</b>：'.$user->profile->sex.'</p>';
                if($user->profile->from !=NULL) echo '<p><b>出身</b>：'.$user->profile->from.'</p>';
                if($user->profile->old !=NULL)  echo '<p><b>年齢</b>：'.$user->profile->old.'歳</p>';
                if($user->profile->job !=NULL)  echo '<p><b>職種</b>：'.$user->profile->job.'</p>';
            @endphp
        </div>
    </article>
    <article class = "details">
        <h2><i class="fas fa-clipboard-list"></i>自己紹介</h2>
        <p>{{$user->profile->profile}}</p>
    </article>
</div>
@endsection
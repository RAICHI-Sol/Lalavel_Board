@extends('layouts/layout_home')

@section("title",$profile->name.'さんのプロフィール')

@section('main')
<div class = "profile">
    <h1>Profile</h1>
    <article class = "besic">
        <div class = "icon"></div>
        <div class = "text">
            @php
                echo '<p><b>名前</b>：'.$profile->name.'</p>';
                if($profile->sex !=NULL)  echo '<p><b>性別</b>：'.$profile->sex.'</p>';
                if($profile->from !=NULL) echo '<p><b>出身</b>：'.$profile->from.'</p>';
                if($profile->old !=NULL)  echo '<p><b>年齢</b>：'.$profile->old.'歳</p>';
                if($profile->job !=NULL)  echo '<p><b>職種</b>：'.$profile->job.'</p>';
            @endphp
        </div>
    </article>
    <article class = "details">
        <h2><i class="fas fa-clipboard-list"></i>自己紹介</h2>
        <p>{{$profile->profile}}</p>
    </article>
</div>
@endsection
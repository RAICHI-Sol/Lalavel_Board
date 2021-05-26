<div class = "setting_menu">
    <h1>menu</h1>
    @if(Request::is('setting/*'))
        <a href = "{{ route('set_prof') }}">
            <i class="fas fa-user-edit"></i>
            <span>プロフィール編集</span>
        </a>
        <a href = "{{ route('set_account') }}">
            <i class="fas fa-cog"></i>
            <span>アカウント設定</span>
        </a>
    @else
        <a href = "{{ route('home_get') }}">
            <i class="fas fa-home"></i>
            <span>ホーム</span>
        </a>
        <a href = "{{ route('gide') }}">
            <i class="fas fa-question-circle"></i>
            <span>このサイトについて</span>
        </a>
    @endif
</div>
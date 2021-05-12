$(function(){
    /************************************************
     * メッセージ送信処理
    ************************************************/
    $('#submit').click(function(){
        message = $('textarea[name="message"]').val();
        id      = $('#id').val();
        target  = $('#target').val();

        var url = '/laravel/public/chat/' + id;
        var data = {
            "target":target,
            "message":message,
        };
        ajaxSend("POST",url,data);
    });
    /************************************************
     * プロフィール設定処理
    ************************************************/
    $('.form > input[type = "submit"]').click(function(){
        username = $('input[name="name"]').val();
        sex      = $('input[name="sex"]').val();
        from     = $('select[name="from"]').val();
        old      = $('select[name="old"]').val();
        job      = $('select[name="job"]').val();
        profile  = $('textarea[name="profile"]').val();

        var url  = '/laravel/public/setting/profile/'
        var data = {
            "name":username,
            "sex":sex,
            "from":from,
            "old":old,
            "job":job,
            "profile":profile,
        };
        ajaxSend("PUT",url,data);
    });
    /************************************************
     * ajaxによるリアルタイム通信
    ************************************************/
    function ajaxSend(type,url,data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:type,
            timeout:10000,
        });
        $.ajax({
            url:url,
            data:data,
            context:{text:type},
        })
        .done(function(result){
            $("body").html(result);
            if(this.text == "PUT"){
                $("body").append("<p class='success_comment'>設定が変更されました</p>");
                setTimeout(function(){
                    $(".success_comment").remove();
                }, 3000);
            }
        })
        .fail(function(jqXML,textStatus,errorThrown){
            $("body").append("<p class='success_comment'>送信が失敗しました</p>");
            setTimeout(function(){
                $(".success_comment").remove();
            }, 3000);
        });
    }
});


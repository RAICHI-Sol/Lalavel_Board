$(function(){
    var jqxhr = null;
    /************************************************
     * メッセージ送信処理
    ************************************************/
    $(document).on('click','#submit',function(){
        //連続入力を中止
        $(document).find('#submit').prop('disabled','true');
        id      = $('#id').val();
        var url = '/chat/' + id;
        messageSend(url);
    });
    /************************************************
     * メッセージ送信処理(User Side)
    ************************************************/
    $(document).on('click','#mysubmit',function(){
        //連続入力を中止
        $(document).find('#mysubmit').prop('disabled','true');
        id      = $('#id').val();
        var url = '/chat/mypage/' + id;
        messageSend(url);
    });

    /************************************************
     * プロフィール設定処理
    ************************************************/
    $(document).on('click','#prosubmit',function(){
        var url  = '/setting/profile';
        var data = {
            "name":$('input[name="name"]').val(),
            "sex":$('input[name="sex"]:checked').val(),
            "from":$('select[name="from"]').val(),
            "old":$('select[name="old"]').val(),
            "job":$('select[name="job"]').val(),
            "profile":$('textarea[name="profile"]').val(),
        };
        ajaxSend("PUT",url,data);
    });

    /************************************************
     * ajaxによるリアルタイム通信
    ************************************************/
    function messageSend(url){
        message = $('textarea[name="message"]').val();

        //メッセージが空の場合送信しない
        if(message == ""){
            return;
        }
        else{
            target  = $('#target').val();

            var data = {
                "target":target,
                "message":message,
            };
            ajaxSend("POST",url,data);
        }
    }

    /************************************************
     * ajaxによるリアルタイム通信
    ************************************************/
    function ajaxSend(type,url,data){
        //直前に実行したajaxを中断
        if(jqxhr){
            jqxhr.abort();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:type,
            timeout:10000,
        });
        jqxhr = $.ajax({
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


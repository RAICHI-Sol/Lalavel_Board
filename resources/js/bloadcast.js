$(function() {
    /*****************************************
    *  Pusherを用いたブロードキャスト
    ******************************************/
    window.Echo.channel('board-channel').listen('PusherEvent',function(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"GET",
            timeout:10000,
        });
        $.ajax({
            url:'/laravel/public/',
        })
        .done(function(result){
            $("body").html(result);
        })
        .fail(function(jqXML,textStatus,errorThrown){
            $("body").append("<p class='success_comment'>送信が失敗しました</p>");
            setTimeout(function(){
                $(".success_comment").remove();
            }, 3000);
        });
    });
});
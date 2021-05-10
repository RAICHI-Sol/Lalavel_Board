$(function(){
    //メッセージ送信処理
    $('#submit').click(function(){
        message = $('textarea[name="message"]').val();
        id      = $('#id').val();
        target  = $('#target').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            timeout:10000,
        });
        $.ajax({
            url:'/laravel/public/chat/' + id,
            data:{
                "target":target,
                "message":message,
            },
        })
        .done(function(result){
            $("body").html(result);
        })
        .fail(function(jqXML,textStatus,errorThrown){
            alert('コメントの送信に失敗しました。id'+id+' message'+message+',target'+target);
        });
    });
});


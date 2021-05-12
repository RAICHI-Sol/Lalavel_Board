/************************************************
 * remove
************************************************/
$(function(){
    $("#remove").on('click',function(){
        $('.fixed').removeClass('on');
    });
});

/************************************************
 * ボードの削除
************************************************/
function click_delete(id)
{
    $("body").append("<div class='fixed on' id = 'delete_fix'></div>");
    $("#delete_fix").append("<div class='box'></div>");
    $(".box").append("<p class ='head'>ボードを削除します。</p>");
    $(".box").append("<button id = 'OK'>削除する</button>");
    $(".box").append("<button id = 'NO'>削除しない</button>");

    $("#OK").on('click',function(){
        var data = {'id':id};
        sendAjax('DELETE','delete',data);
    });

    $("#NO").on('click',function(){
        $('#delete_fix').remove();
    });
}

/************************************************
 * ボードの編集
************************************************/
function click_edit(id,beforeName,beforeComment)
{
    var newComment = beforeComment.replace(/(<br>)/g,'\n');

    $("input[name = 'name']").val(beforeName);
    $('textarea[name = "comment"]').val(newComment);

    $('.fixed').addClass('on');

    $("#submit").on('click',function(){
        var comment = $("textarea[name = 'comment']").val();
        var name    = $("input[name = 'name']").val();
        var data = {'id':id,'name':name,'comment':comment};
        sendAjax('PUT','update',data);
    });
}

/************************************************
 * ajaxによるリアルタイム通信
************************************************/
function sendAjax(type,pass,data)
{
    var url = pass;
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
        context:{text:pass},
    })
    .done(function(result)
    {
        var message = {update:'編集',delete:'削除'};
        $("body").html(result);
        $("body").append("<p class='success_comment'>ボードを"+ message[this.text] +"しました。</p>");
        setTimeout(function(){
            $(".success_comment").remove();
        }, 3000);
    })
    .fail(function(jqXML,textStatus,errorThrown){
        alert('通信が失敗しました');
    });
}
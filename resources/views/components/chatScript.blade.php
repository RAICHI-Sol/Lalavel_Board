<script src = '/laravel/resources/js/main.js'></script>
<script src="/laravel/public/js/app.js"></script>
<?php
    echo '<script>var id = '.Auth::id().'</script>';
    echo '<script>var url = "'.$url.'"</script>';
?>
<script>
    $(function() {
        window.Echo.channel('chat-channel.' + id).listen('ChatEvent',function(data){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"GET",
                timeout:10000,
            });
            $.ajax({
                url:url,
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
</script>
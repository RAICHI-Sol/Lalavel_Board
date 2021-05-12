//ヘッダーをスクロールするスクリプト
$(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > 100){
            $('header').addClass('scroll');
            $('main').addClass('scroll');
        }
        else{
            $('header').removeClass('scroll');
            $('main').removeClass('scroll');
        }
    });
});
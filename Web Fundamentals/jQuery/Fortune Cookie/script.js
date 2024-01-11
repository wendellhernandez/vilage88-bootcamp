$(function(){
    $('img').hover(function(){
        data =  $(this).attr('data-alt-src');
        $(this).attr('src' , `assets/${data}`);
    }, function(){
        $(this).attr('src' , 'assets/cookie.jpg');
    })
})
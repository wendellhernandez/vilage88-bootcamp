$(function(){
    $('div').click(function(){
        $('img').removeClass('background_active');
        $('div').css('background-image' , '');
    })

    $('img').click(function(e){
        e.stopPropagation();
        $('img').removeClass('background_active');
        $(this).addClass('background_active');
        let url = $(this).attr('src');
        $('div').css('background-image' , `url("${url}")`);
    })
})
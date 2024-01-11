$(function(){
    $('img').click(function(){
        let data =  $(this).attr('data-alt-src');
        $(this).attr('src' , `assets/${data}`);
    })

    $('button').click(function(){
        $('img').attr('src' , `assets/question.png`);
    })
})
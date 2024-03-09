$(document).ready(function(){
    $('form').submit(function(){
        $.post($(this).attr('action') , $(this).serialize() , function(data){
            $('.players_section').html(data);
        })
        return false;
    })
})
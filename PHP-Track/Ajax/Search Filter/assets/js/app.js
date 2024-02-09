$(document).ready(function(){
    $("form").submit(function(){
        $.post($(this).attr("action") , $(this).serialize() , function(data){
            $(".table_container").html(data);
        })

        return false;
    })

    $("form").submit();
});
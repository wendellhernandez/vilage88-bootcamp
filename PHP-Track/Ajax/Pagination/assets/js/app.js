$(document).ready(function(){
    $(document).on("submit" , "form" , function(){
        $.post($(this).attr("action") , $(this).serialize() , function(data){
            $(".table_container").html(data);
        })

        return false;
    })

    $(document).on("keyup" , "#form_filter" , function(){
        $(this).submit();
    })

    $(document).on("change" , "#form_filter" , function(){
        $(this).submit();
    })

    $("form").submit();
});
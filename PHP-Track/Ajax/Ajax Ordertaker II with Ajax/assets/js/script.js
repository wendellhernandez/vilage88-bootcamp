$(document).ready(function(){
    $(document).on("submit" , "form" , function(){
        $.post($(this).attr("action") , $(this).serialize() , function(data){
            $("#order_wrapper").html(data);
        });
        return false;
    });

    $(document).on("change" , "textarea" , function(){
        $(this).parent().submit();
    });

    $("form").submit();

    $(document).on("click" , ".order_title" , function(){
        $(this).siblings().children().show();
        $(this).hide();
    })

    $(document).on("blur" , "textarea" , function(){
        $(this).parent().siblings().show();
        $(this).hide();
    })
});
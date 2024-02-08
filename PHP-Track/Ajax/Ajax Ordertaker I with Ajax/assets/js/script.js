$(document).ready(function(){
    $.get("/orders/orders_api" , function(data){
        $("#order_wrapper").html(data);
    });

    $("form").submit(function(){
        $.post("/orders/create" , $(this).serialize() , function(data){
            $("#order_wrapper").html(data);
        })

        return false;
    })
})
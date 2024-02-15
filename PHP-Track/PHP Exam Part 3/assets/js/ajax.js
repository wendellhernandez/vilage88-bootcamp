$(document).ready(function(){
    $('select , input').change(function(){
        $('form').submit();
    });
    
    $('form').submit(function(){
        $.post($(this).attr('action') , $(this).serialize() , function(data){
            $('.leave_container').html(data);
        })

        return false;
    });

    $('form').submit();
});
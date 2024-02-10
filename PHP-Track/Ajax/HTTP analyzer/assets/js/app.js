$(document).ready(function() {
    $('form').submit(function() {
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            $(".fetch_container").html(data);
        });
        
        return false;
    });
});
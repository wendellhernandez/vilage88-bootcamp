$(function(){
    $('#click_button button , #hide_button button').click(function(){
        $('#click_button div').hide(1000);
    })

    $('#hide_button button').click(function(){
        $('#hide_button div').hide(1000);
    })

    $('#show_button div').hide();

    $('#show_button button').click(function(){
        $('#show_button div').show(1000);
    })

    $('#toggle_button button').click(function(){
        $('#toggle_button div').toggle(1000);
    })

    $('#slideDown_button div').hide();

    $('#slideDown_button button').click(function(){
        $('#slideDown_button div').slideDown(1000);
    })

    $('#slideUp_button button').click(function(){
        $('#slideUp_button div').slideUp(1000);
    })

    $('#slideToggle_button button').click(function(){
        $('#slideToggle_button div').slideToggle(1000);
    })

    $('#fadeIn_button div').hide();

    $('#fadeIn_button button').click(function(){
        $('#fadeIn_button div').fadeIn(1000);
    })

    $('#fadeOut_button button').click(function(){
        $('#fadeOut_button div').fadeOut(1000);
    })

    $('#addClass_button button').click(function(){
        $('#addClass_button div').addClass('highlight');
    })

    $('#before_button button').click(function(){
        $('#before_button div').before('top');
    })

    $('#after_button button').click(function(){
        $('#after_button div').after('bottom');
    })

    $('#append_button button').click(function(){
        $('#append_button div').append('right');
    })

    $('#html_button button').click(function(){
        $('#html_button div').html('changed');
    })

    $('#attr_button button').click(function(){
        $('#attr_button div input').attr('placeholder' , 'Changed');
    })

    $('#val_button button').click(function(){
        $('#val_button div input').val('Changed');
    })

    $('#text_button button').click(function(){
        $('#text_button div').text('Changed');
    })
})
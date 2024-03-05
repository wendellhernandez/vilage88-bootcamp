$(document).ready(function(){
    const socket = io();
    const form = $('form');
    const message_input = $('.message_input');
    let guess_word = 'socket';

    let name = '';

    function get_name(){
        if(name = prompt('Enter your name')){
            $('body').show();
            $('input').focus();
        }else{
            get_name();
        }
    }

    get_name();
    
    form.submit(function(e){
        e.preventDefault();

        if(message_input.val()){
            socket.emit('new_message' , {name , message: message_input.val()});

            message_input.val('');
        }
    })

    socket.on('set_message' , function(messages){
        $('.chatbox').html('');
        let answered = false;

        for(const message of messages){
            let elem = document.createElement('p');

            if(message.message === guess_word && !answered){
                elem.textContent = `${message.username} won! "${guess_word}" is the exact word!`;
                elem.classList.add('correct_answer');
                answered = true;
            }else{
                elem.textContent = `${message.username}: ${message.message}`;
            }

            $('.chatbox').append(elem);
        }
    })
})
$(document).ready(function(){
    const socket = io();

    $('form').submit(function(){
        socket.emit('posting_form' , $(this).serializeArray());

        return false;
    })

    socket.on('updated_message' , function(data){
        $('header').html('');

        let elem = document.createElement('p');
        elem.innerText = data.msg;

        $('header').append(elem);
    })

    socket.on('id_number' , function(data){
        let elem = document.createElement('p');
        elem.innerText = data.number;

        $('header').append(elem);
    })
})
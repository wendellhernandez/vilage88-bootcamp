$(document).ready(function(){
    const socket = io();

    socket.on('user_connected' , function(id){
        $('.chatbox').append(`<p>Socket ID <span>${id}</span> is present.</p>`);
    })

    socket.on('user_disconnected' , function(id){
        $('.chatbox').append(`<p>Socket ID <span>${id}</span> left.</p>`);
    })

    $('button').click(function(){
        socket.emit('raise_hand');
    })

    socket.on('raised_hand' , function(id){
        $('.chatbox').append(`<p>Socket ID <span>${id}</span> raised hand!</p>`);
    })
})
$(document).ready(function(){
    const socket = io();

    $('#light_mode').click(function(){
        socket.emit('lightMode');
    })

    $('#dark_mode').click(function(){
        socket.emit('darkMode');
    })

    $('#random_mode').click(function(){
        socket.emit('randomMode');
    })

    socket.on('updateAllBg' , function(current_bg){
        $('body').css('background-color' , current_bg);
    })
})
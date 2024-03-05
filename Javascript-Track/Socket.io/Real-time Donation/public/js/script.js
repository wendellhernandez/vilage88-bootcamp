$(document).ready(function(){
    const socket = io();

    $('#donate').click(function(){
        socket.emit('donate');
    })

    $('#redeem').click(function(){
        socket.emit('redeem');
    })

    socket.on('updateDonation' , function(data){
        $('#donations').text(data);
    })
})
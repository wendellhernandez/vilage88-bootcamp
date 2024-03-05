$(document).ready(function(){
    const socket = io();
    let socket_id;
    let all_games;
    let game = {
        player: {
            topOffset: 0,
            leftOffset: 0
        },
        enemy: {

        }
    };

    socket.on('socket_id' , function(id){
        socket_id = id;

        let elem = $('<div class="player"></div>').appendTo($('main'));
        // $('main').append(elem);
    })

    socket.on('update_client' , function(games){
        all_games = games;
        game = games[socket_id];

        console.log(game.player.topOffset);
    })
    
    function update(){
        socket.emit('update_server' , game);

        $('.player').css({top: game.player.topOffset , left: game.player.leftOffset});
        console.log($('.player'));
        requestAnimationFrame(update);
    }
    
    requestAnimationFrame(update);

    $('main').mousemove(function(e){
        game.player.topOffset = e.offsetY-24;
        game.player.leftOffset = e.offsetX-24;

        $(this).css('cursor' , 'none');
    })

})
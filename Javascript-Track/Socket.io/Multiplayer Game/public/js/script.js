const socket = io();
/*
    Docu: Game Variables
    Owner: Wendell
*/
let background_position = 100;
let enemies = [];
let players = [];
let projectile_counter = 0
let player_update = {};
/*
    Docu: Get game variables from the server every 14ms
    Owner: Wendell
*/
socket.on('update_client' , function(data){
    background_position = data.background_position;
    players = data.players;
    enemies = data.enemies;
})
/*
    Docu: Send game variables to the server every 14ms
    Owner: Wendell
*/
function update(){
    socket.emit('update_server' , player_update);
    /*
        Docu: updates the background position so it moves up
        Owner: Wendell
    */
    $('main').css('background-position' , `0% ${background_position}%`);
    $('main').html('');

    for(const player of players){
        let elem = $('<div>');
        elem.addClass('player');
        elem.css({'top' : player.yAxis , 'left' : player.xAxis});
        $('main').append(elem);

        for(const projectile of player.projectiles){
            let elem = $('<div>');
            elem.addClass('projectile');
            elem.css({'top' : projectile.yAxis , 'left' : projectile.xAxis});
            $('main').append(elem);
        }
    }

    for(const enemy of enemies){
        let elem = $('<div>');
        elem.addClass('enemy');
        elem.css({'top' : enemy.yAxis , 'left' : enemy.xAxis});
        $('main').append(elem);
    }

    requestAnimationFrame(update);
}

// requestAnimationFrame(update);
/*
    Docu: Change player position using mouse pointer event
    Owner: Wendell
*/
$('main').mousemove(function(e){
    player_update.xAxis = e.offsetX-34;
    player_update.yAxis = e.offsetY-24;
})
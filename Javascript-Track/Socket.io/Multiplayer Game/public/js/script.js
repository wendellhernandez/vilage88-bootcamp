class Game{
    constructor(socket){
        /*
            Docu: Game Variables
            Owner: Wendell
        */
        this.socket = socket;
        this.background_position = 100;
        this.enemies = [];
        this.players = [];
        this.projectile_counter = 0
        this.player_update = {};
    }
    /*
        Docu: Send game variables to the server every 13ms
        Owner: Wendell
    */
    update(){
        setInterval(function(){
            game.socket.emit('update_server' , game.player_update);
            /*
                Docu: updates the background position so it moves up
                Owner: Wendell
            */
            $('main').css('background-position' , `0% ${game.background_position}%`);
            $('main').html('');
            $('.score_board').html('<p class="title">SCORE BOARD</p>');
            /*
                Docu: Adds players planes to the game
                Owner: Wendell
            */
            for(const player of game.players){
                let elem = $('<div>');
                elem.addClass('player');
                elem.css({'top' : player.yAxis , 'left' : player.xAxis});
                elem.html(`<span>${player.id.substring(0,6)}</span>`);
                $('main').append(elem);
                /*
                    Docu: Adds player scores to the game
                    Owner: Wendell
                */
                let elem2 = $('<div>');
                elem2.addClass('score');
                elem2.html(`${player.id.substring(0,6)}: ${player.score}`)
                $('.score_board').append(elem2);
                /*
                    Docu: Adds player bullets to the game
                    Owner: Wendell
                */
                for(const projectile of player.projectiles){
                    let elem = $('<div>');
                    elem.addClass('projectile');
                    elem.css({'top' : projectile.yAxis , 'left' : projectile.xAxis});
                    $('main').append(elem);
                }
            }
            /*
                Docu: Adds enemy planes to the game
                Owner: Wendell
            */
            for(const enemy of game.enemies){
                if(enemy){
                    let elem = $('<div>');
                    elem.addClass('enemy');
                    elem.css({'top' : enemy.yAxis , 'left' : enemy.xAxis});
                    elem.html(`<span>${enemy.health}</span>`);
                    $('main').append(elem);
                }
            }
        } , 13);
    }
    /*
        Docu: Get game variables from the server every 13ms
        Owner: Wendell
    */
    update_client(){
        game.socket.on('update_client' , function(data){
            game.background_position = data.background_position;
            game.players = data.players;
            game.enemies = data.enemies;
        })
        /*
            Docu: Change player position using mouse pointer event
            Owner: Wendell
        */
        $('main').mousemove(function(e){
            game.player_update.xAxis = e.offsetX-34;
            game.player_update.yAxis = e.offsetY-24;
        })
        /*
            Docu: Shoots when f key is pressed
            Owner: Wendell
        */
        $(document).keydown(function(e){
            if(e.key == 'f'){
                socket.emit('shoot');
            }
        })
        
        $('button').click(function(){
            socket.emit('join');
        })
    }
}

const socket = io();
const game = new Game(socket);

game.update();
game.update_client();
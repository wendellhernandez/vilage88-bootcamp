const express = require("express");
const { createServer } = require("http");
const { Server } = require("socket.io");
const app = express();
const httpServer = createServer(app);
const io = new Server(httpServer);

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

const scale = 2.5;
let background_position = 100;
let enemies = [];
let players = [];
let projectile_timer = 0

/*
    Docu: Adds enemies in random positions 
            every set amount of time
    Owner: Wendell
*/
function getRandHealth(){
    return Math.floor(Math.random() * 20) + 20;
}

function getRandX(){
    return Math.floor(Math.random() * 260 * scale);
}

setInterval(function(){
    enemies.push(
        {
            xAxis: getRandX(),
            yAxis: 0,
            health: getRandHealth(),
            direction: Math.round(Math.random()) * 2 - 1
        }
    )
} , 300);

io.on('connection' , function(socket){
    /*
        Docu: Adds player when join button is clicked
        Owner: Wendell
    */
    socket.on('join' , function(){
        function find_player(){
            for(const player of players){
                if(player.id === socket.id){
                    return true;
                }
            }

            return false;
        }

        if(!find_player()){
            players.push(
                {
                id: socket.id,
                xAxis: 0,
                yAxis: 0,
                projectiles: [
                    {
                        xAxis: 0,
                        yAxis: 0,
                    }
                ],
                score: 0
                }
            )
        }
    })
    /*
        Docu: Creates projectiles when player is shooting
        Owner: Wendell
    */
    socket.on('shoot' , function(){
        for(const player of players){
            if(player.id === socket.id){
                player.projectiles.push(
                    {
                        xAxis: player.xAxis + 16 * scale,
                        yAxis: player.yAxis - 3 * scale,
                    }
                )
            }
        }
    })

    socket.on('update_server' , function(player_update){
        projectile_timer++;

        for(const player of players){
            /*
                Docu: Updates player movements
                Owner: Wendell
            */
            if(player.id === socket.id){
                if(player_update.xAxis){
                    player.xAxis = player_update.xAxis;
                    player.yAxis = player_update.yAxis;
                }
            }
            /*
                Docu: Slides all projectiles upwards and removes them
                        if they go off-screen
                Owner: Wendell
            */
            for(let i=0; i<player.projectiles.length; i++){
                player.projectiles[i].yAxis -= 1.5 * scale;

                if(player.projectiles[i].yAxis < 0){
                    player.projectiles.splice(i,1);
                }
            }
        }
        /*
            Docu: Set enemy movements and removes them if they 
                    go off-screen
            Owner: Wendell
        */
        for(let i=0; i<enemies.length; i++){
            if(enemies[i].xAxis){
                for(let j=0; j<players.length; j++){
                    for(let k=0; k<players[j].projectiles.length; k++){
                        if(
                            (players[j].projectiles[k].xAxis > enemies[i].xAxis
                            && 
                            players[j].projectiles[k].xAxis < enemies[i].xAxis + 12 * scale)

                            &&

                            (players[j].projectiles[k].yAxis > enemies[i].yAxis
                                && 
                                players[j].projectiles[k].yAxis < enemies[i].yAxis + 12 * scale)
                        ){
                            enemies[i].health--;
                            players[j].projectiles.splice(k,1);
                            players[j].score += 1;
                        }
                    }

                    if(
                        (enemies[i].xAxis + 8 * scale> players[j].xAxis
                        && 
                        enemies[i].xAxis + 8 * scale < players[j].xAxis + 34 * scale)

                        &&

                        (enemies[i].yAxis + 12 * scale > players[j].yAxis
                        && 
                        enemies[i].yAxis + 12 * scale < players[j].yAxis + 24 * scale)
                    ){
                        players.splice(j,1);
                    }
                }
                /*
                    Docu: Moves the enemies down, left or right and
                            removes enemies when off-screen
                    Owner: Wendell
                */
                enemies[i].xAxis += enemies[i].direction * 0.3;
                enemies[i].yAxis += 1;

                if(enemies[i].yAxis > 363 * scale){
                    enemies.splice(i,1);
                }
                /*
                    Docu: Removes enemies when health is zero
                    Owner: Wendell
                */
                if(enemies[i].health != undefined){
                    if(enemies[i].health < 1){
                        enemies.splice(i,1);
                    }
                }
            }
        }
        /*
            Docu: Slides the background image upward for all players
                    and resets
            Owner: Wendell
        */
        if(background_position > 0){
            background_position -= 0.005;
        }else{
            background_position = 100;
        }
        /*
            Docu: Sends players, background positions and enemies to the client
                    for update every 14ms
            Owner: Wendell
        */
        io.emit('update_client' , {players , background_position , enemies});
    });
    /*
        Docu: Listen for disconnect and removes player
        Owner: Wendell
    */
    socket.on('disconnect' , function(){
        for(let i=0; i<players.length; i++){
            if(players[i].id === socket.id){
                players.splice(i,1);
            }
        }
    })
})
/*
    Docu: Express routing. Render index page
    Owner: Wendell
*/
app.get('/', function(req, res) {
    res.render("index");
})

httpServer.listen(8000);
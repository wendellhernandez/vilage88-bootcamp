const express = require("express");
const { createServer } = require("http");
const { Server } = require("socket.io");
const app = express();
const httpServer = createServer(app);
const io = new Server(httpServer);

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

let background_position = 100;
let enemy_initial_health = 10;
let enemies = [];
let players = [];
let projectile_counter = 0

io.on('connection' , function(socket){
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
        ]
        }
    )

    enemies.push(
        {
            xAxis: 0,
	        yAxis: 0,
            health: enemy_initial_health
        }
    )

    setInterval(function(){
        enemies.push(
            {
                xAxis: 0,
                yAxis: 0,
                health: 10
            }
        )
    } , 3000);

    socket.on('update_server' , function(player_update){
        projectile_counter++;

        for(const player of players){
            if(player.id === socket.id){
                player.xAxis = player_update.xAxis;
                player.yAxis = player_update.yAxis;
            }

            if(projectile_counter > 10){
                projectile_counter = 0;
                if(player_update.xAxis){
                    player.projectiles.push(
                        {
                            xAxis: player_update.xAxis + 31,
                            yAxis: player_update.yAxis - 5,
                        }
                    )
                }
            }

            for(let i=0; i<player.projectiles.length; i++){
                player.projectiles[i].yAxis -= 6;

                if(player.projectiles[i].yAxis < 0){
                    player.projectiles.splice(i,1);
                }
            }
        }

        if(background_position > 0){
            background_position -= 0.01;
        }else{
            background_position = 100;
        }

        io.emit('update_client' , {players , background_position , enemies});
    });

    socket.on('disconnect' , function(){
        for(let i=0; i<players.length; i++){
            if(players[i].id === socket.id){
                players.splice(i,1);
            }
        }
    })
})

app.get('/', function(req, res) {
    res.render("index");
})

httpServer.listen(8000);
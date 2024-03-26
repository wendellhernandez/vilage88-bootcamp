/*
    Docu: All of my middlewares
    Owner: Wendell
*/
const express = require("express");
const app = express();
const server = app.listen(8000);
const io = require('socket.io')(server);
/*
    Docu: Location of my statics folder and I use ejs as the view engine
    Owner: Wendell
*/
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');
/*
    Docu: Array for all the players and their created blocks
    Owner: Wendell
*/
const players = [];
let blocks = [];
/*
    Docu: Activates socket event listeners on connection
    Owner: Wendell
*/
io.on('connection' , function(socket){
    /*
        Docu: Creates a new player object and put it in the players array
        Owner: Wendell
    */
    socket.on('new_player' , function(name){
        player = {
            name,
            id: socket.id,
            x_axis: 0,
            y_axis: 0,
        }

        players.push(player);

        io.emit('add_new_player' , {players , blocks});
    })
    /*
        Docu: Updates players cursor location
        Owner: Wendell
    */
    socket.on('update_server_player' , function(data){
        for(let i=0; i<players.length; i++){
            if(players[i].id == socket.id){
                players[i].x_axis = data.x_axis;
                players[i].y_axis = data.y_axis;
            }
        }

        io.emit('update_client_player' , players);
    })
    /*
        Docu: Add new block to the block array
        Owner: Wendell
    */
    socket.on('update_server_block' , function(data){
        blocks.push({
            block_color: data.current_block_color,
            x_axis: data.x_axis,
            y_axis: data.y_axis
        });

        io.emit('update_client_block' , blocks);
    })
    /*
        Docu: Clears the block array
        Owner: Wendell
    */
    socket.on('clear_canvas_server' , function(){
        blocks = [];

        io.emit('clear_canvas_client' , blocks);
    })
    /*
        Docu: Removes player when disconnected
        Owner: Wendell
    */
    socket.on('disconnect' , function(){
        for(let i=0; i<players.length; i++){
            if(players[i].id == socket.id){
                players.splice(i,1);
            }
        }

        io.emit('player_disconnect' , {players});
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
const express = require("express");
const app = express();
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

let games = {};

io.on('connection' , function(socket){
    socket.emit('socket_id' , socket.id);

    socket.on('update_server' , function(game){
        games[socket.id] = game;

        io.emit('update_client' , games);
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
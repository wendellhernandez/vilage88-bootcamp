const express = require("express");
const app = express();
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

io.on('connection' , function(socket){
    socket.broadcast.emit('user_connected' , socket.id);

    socket.on('disconnect' , function(){
        socket.broadcast.emit('user_disconnected' , socket.id);
    });

    socket.on('raise_hand' , function(){
        socket.broadcast.emit('raised_hand' , socket.id);
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
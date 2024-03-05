const express = require("express");
const app = express();
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

let messages = [];

io.on('connection' , function(socket){
    socket.on('new_message' , function(data){
        let id = socket.id.substring(0,4);
        let username = `${id}@${data.name}`;
        let message = data.message;

        let chat = {
            username,
            message
        }

        messages.push(chat);

        io.emit('set_message' , messages);
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
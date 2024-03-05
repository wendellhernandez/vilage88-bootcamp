const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

const light = '#aaa';
const dark = '#222'

const rgb = ['a','b','c','d','e','f','0','1','2','3','4','5','6','7','8','9'];

function get_random_color(){
    let random_color = '#';

    for(let i = 0; i < 6; i++){
        let x = Math.floor((Math.random()*16));  // 16 for hex
        random_color += rgb[x]; 
    }

    return random_color;
}

let current_bg = dark;

io.on('connection' , function(socket){
    socket.emit('updateAllBg' , current_bg);

    socket.on('lightMode' , function(){
        current_bg = light;
        io.emit('updateAllBg' , current_bg);
    })

    socket.on('darkMode' , function(){
        current_bg = dark;
        io.emit('updateAllBg' , current_bg);
    })

    socket.on('randomMode' , function(){
        current_bg = get_random_color();
        console.log(current_bg);
        io.emit('updateAllBg' , current_bg);
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
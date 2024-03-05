const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

let donation = 100;

io.on('connection' , function(socket){
    io.emit('updateDonation' , donation);

    socket.on('donate' , function(){
        donation += 10;
        io.emit('updateDonation' , donation);
    })

    socket.on('redeem' , function(){
        if(donation > 0){
            donation -= 10;
        }
        io.emit('updateDonation' , donation);
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
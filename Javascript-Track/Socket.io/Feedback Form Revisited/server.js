const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const server = app.listen(8000);
const io = require('socket.io')(server);

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

io.on('connection' , function(socket){
    socket.on('posting_form' , function(datas){
        let random = Math.ceil(Math.random() * 1000);
        let form_data = {};

        for(data of datas){
            form_data[data.name] = data.value;
        }

        let msg = `You emitted the following values to the server: ` + 
        `{ name: ${form_data.name}, course_title: ${form_data.course}, ` +
        `score: ${form_data.score}, reason: ${form_data.reason} }`;

        socket.emit('updated_message' , { msg });
        socket.emit('id_number' , { number: `Random generated id number is ${random}` });
    })
})

app.get('/', function(req, res) {
    res.render("index");
})
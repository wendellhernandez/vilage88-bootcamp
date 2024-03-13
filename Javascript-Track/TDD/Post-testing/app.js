/*
    Middlewares
*/
const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const session = require('express-session');
const {view_engine , port} = require('./config');
/*
    Initialize Middlewares
*/
app.set('views', __dirname + '/views');
app.set('view engine', view_engine);
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/assets"));
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 60000 }
}))

app.use('/' , require('./routes'));

app.listen(port , function(){
    console.log('Listening from port: ' + port);
});
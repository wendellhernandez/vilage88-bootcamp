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
/*
    Connect Routes
*/
app.use('/' , require('./routes'));
/*
    Listen to port set in config file
*/
app.listen(port , function(){
    console.log('Listening from port: ' + port);
});
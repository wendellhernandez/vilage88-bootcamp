/*
    Middlewares
*/
const express = require("express");
const routes = express();
const bodyParser = require('body-parser');
const session = require('express-session')
const {view_engine} = require('./config');
/*
    Initialize Middlewares
*/
routes.set('views', __dirname + '/views');
routes.set('view engine', view_engine);
routes.use(bodyParser.urlencoded({ extended: true }));
routes.use(express.static(__dirname + "/assets"));
routes.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 60000 }
  }))
/*
    Controllers
*/
const CarController = require(`./controllers/Cars`);
/*
    Routes
*/
routes.get("/", CarController.index);
routes.get("/reset", CarController.reset);

module.exports = routes;
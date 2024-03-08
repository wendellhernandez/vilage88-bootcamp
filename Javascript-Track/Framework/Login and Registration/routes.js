/*
    Middlewares
*/
const express = require("express");
const routes = express();
const bodyParser = require('body-parser');
const session = require('express-session');
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
const StudentController = require(`./controllers/Students`);
/*
    Routes
*/
routes.get("/", StudentController.index);
routes.get("/students/profile", StudentController.profile);
routes.post("/login", StudentController.login);
routes.post("/register", StudentController.register);

module.exports = routes;
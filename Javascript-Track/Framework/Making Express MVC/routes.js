const express = require("express");
const routes = express();
const bodyParser = require('body-parser');
const {view_engine} = require('./config');

routes.use(bodyParser.urlencoded({ extended: true }));
routes.use(express.static(__dirname + "/assets"));
routes.set('views', __dirname + '/views');
routes.set('view engine', view_engine);
/*
    Controllers
*/
const FeedbackController = require(`./controllers/Feedbacks`);
/*
    Routes
*/
routes.get("/", FeedbackController.index);
routes.post('/result', FeedbackController.result);

module.exports = routes;
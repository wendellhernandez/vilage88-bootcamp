const express = require("express");
const app = express();
const bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

app.get('/', function(req, res) {
    res.render("index");
})

app.post('/users', function(req, res) {
    console.log("POST DATA", req.body);

    res.redirect('/');
})

app.listen(8000, function() {
    console.log("listening on port 8000");
});
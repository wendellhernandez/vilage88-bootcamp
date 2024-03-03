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

app.post('/result', function(req, res) {
    let data = {
        'name' : req.body.name,
        'course' : req.body.course,
        'score' : req.body.score,
        'reason' : req.body.reason
    }

    res.render("result" , data);
})

app.listen(8000, function() {
    console.log("listening on port 8000");
});
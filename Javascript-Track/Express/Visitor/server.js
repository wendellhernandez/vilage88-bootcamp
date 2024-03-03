const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const session = require('express-session');

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.use(session({
    secret: 'keyboardkitteh',
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 60000 }
}))
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

app.get('/', function(req, res) {
    if(!req.session.visit){
        req.session.visit = 1;
    }else{
        req.session.visit++;
    }

    res.render("index" , {visit : req.session.visit});
})

app.get('/reset', function(req, res) {
    req.session.visit = 0;

    res.redirect('/');
})

app.get('/repeat', function(req, res) {
    req.session.visit--;

    res.redirect('/');
})

app.listen(8000, function() {
    console.log("listening on port 8000");
});
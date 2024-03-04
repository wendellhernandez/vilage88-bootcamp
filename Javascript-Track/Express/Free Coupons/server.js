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
    if(!req.session.coupon_left && req.session.coupon_left !=0){
        req.session.coupon_left = 10;
    }

    data = {
        'coupon_left' : req.session.coupon_left
    }

    res.render("index" , data);
})

app.get('/result', function(req, res) {
    let random = Math.floor(Math.random() * 9000000) + 1000000;

    data = {
        'coupon_left' : req.session.coupon_left,
        'name' : req.session.name,
        'random' : random
    }

    res.render("result" , data);
})

app.post('/claim', function(req, res) {
    if(req.body.claim_button && req.session.coupon_left > 0){
        req.session.coupon_left--;
        req.session.name = req.body.name;
        res.redirect('/result');
    }else if(req.body.claim_button && req.session.coupon_left <= 0){
        req.session.coupon_left = 0;

        res.redirect('/');
    }else if(req.body.reset_button){
        req.session.coupon_left = 10;

        res.redirect('/');
    }
})

app.listen(8000, function() {
    console.log("listening on port 8000");
});
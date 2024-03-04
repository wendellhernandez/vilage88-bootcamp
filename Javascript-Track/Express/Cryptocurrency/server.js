const express = require("express");
const app = express();
const bodyParser = require('body-parser');
const axios = require('axios');

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/public"));
app.set('views', __dirname + '/public/views');
app.set('view engine', 'ejs');

app.get('/', function(req, res) {
    res.render("index");
})

app.get('/platforms', function(req, res) {
    res.render("platforms");
})

app.get('/exchanges', function(req, res) {
    res.render("exchanges");
})

app.get('/get_coins', function(req, res){
    axios.get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc')
    .then(data => {
        res.json(data.data);
    })
    .catch(error => {
        res.json(error);
    })
});

app.get('/get_platforms', function(req, res){
    axios.get('https://api.coingecko.com/api/v3/asset_platforms')
    .then(data => {
        res.json(data.data);
    })
    .catch(error => {
        res.json(error);
    })
});

app.get('/get_exchanges', function(req, res){
    axios.get('https://api.coingecko.com/api/v3/exchanges')
    .then(data => {
        res.json(data.data);
    })
    .catch(error => {
        res.json(error);
    })
});

app.listen(8000, function() {
    console.log("listening on port 8000");
});
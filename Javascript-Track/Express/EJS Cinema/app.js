const express = require('express');
const app = express();
const port = 8000;

app.use(express.static(__dirname));
app.set('views' , __dirname + '/views');
app.set('view engine' , 'ejs');

app.get('/movies' , function(request , response){
    response.render('movies');
})

app.get('/theaters' , function(request , response){
    response.render('theaters');
})

app.get('/movies/new' , function(request , response){
    response.render('form');
})

app.listen(port , function(){
    console.log('port: ' + port);
})
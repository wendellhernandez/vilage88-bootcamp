const express = require('express');
const app = express();
const port = 8000;

app.use(express.static(__dirname));
app.set('views' , __dirname + '/views');
app.set('view engine' , 'ejs');

app.get('/awards' , function(request , response){
    response.render('awards');
})

app.get('/awards/1' , function(request , response){
    const data = {
        'title' : 'Mission Impossible',
        'image' : '1.jpg',
        'awards' : ['best picture' , 'best action' , 'best movie']
    }

    response.render('details' , data);
})

app.get('/awards/2' , function(request , response){
    const data = {
        'title' : 'Edge of Tommorrow',
        'image' : '2.jpg',
        'awards' : ['best sci fi' , 'best plot' , 'best wow factor']
    }

    response.render('details' , data);
})

app.get('/awards/3' , function(request , response){
    const data = {
        'title' : 'The Mummy',
        'image' : '3.jpg',
        'awards' : ['best mommy' , 'best tom cruise' , 'wow just wow']
    }

    response.render('details' , data);
})

app.listen(port , function(){
    console.log('port: ' + port);
})
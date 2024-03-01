// get the http module:
const http = require('http');
// fs module allows us to read and write content for responses!!
const fs = require('fs');
// creating a server using http module:
const server = http.createServer(function (request, response){
    // see what URL the clients are requesting:
    console.log('client request URL: ', request.url);
    // this is how we do routing:
    if(request.url === '/movies') {
        fs.readFile('./views/movies.html', 'utf8', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'text/html'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/theaters'){
        fs.readFile('./views/theaters.html', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'text/html'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/movies/new'){
        fs.readFile('./views/newmovies.html', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'text/html'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/stylesheets/style.css'){
        fs.readFile('./stylesheets/style.css', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'text/css'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/1.jpg'){
        fs.readFile('images/1.jpg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/2.jpg'){
        fs.readFile('images/2.jpg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/3.jpg'){
        fs.readFile('images/3.jpg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/t1.jpg'){
        fs.readFile('images/t1.jpg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/t2.jpg'){
        fs.readFile('images/t2.jpeg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else if(request.url === '/images/t3.jpg'){
        fs.readFile('images/t3.jpg', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'image/jpg'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
    else {
        fs.readFile('views/error.html', 'utf8', function (errors, contents){
            response.writeHead(200, {'Content-Type' : 'text/html'});  // send data about response
            response.write(contents);  //  send response body
            response.end(); // finished!
        });
    }
});
// tell your server which port to run on
server.listen(7890);
// print to terminal window
console.log("Running in localhost at port 7890");
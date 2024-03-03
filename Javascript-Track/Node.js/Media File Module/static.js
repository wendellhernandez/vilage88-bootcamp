const fs   = require('fs');

function static_contents(request, response){
    console.log('Request', request.url);

    let url = request.url;
    let arr = url.split('.');
    let ext = arr[arr.length-1];

    if(request.url === '/'){
        fs.readFile('views/index.html', 'utf8', function (errors, contents) {
            response.writeHead(200, {'Content-type': 'text/html'});
            response.write(contents); 
            response.end();
        });
    }
    else if(ext === 'html'){
        fs.readFile(`views${request.url}`, 'utf8', function (errors, contents) {
            response.writeHead(200, {'Content-type': 'text/html'});
            response.write(contents); 
            response.end();
        });
    }
    else if(ext === 'css'){
        let url = request.url;
        let newUrl = url.substring(1, url.length);

        fs.readFile(newUrl , function (errors, contents) {
            response.writeHead(200 , {'Content-Type' : 'text/css'})
            response.write(contents);
            response.end();
        });
        console.log(request.url);
    }
    else {
        response.end('File not found!!!');
    }
}

module.exports = static_contents;
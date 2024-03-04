$(document).ready(function(){
    const containers = document.getElementsByClassName('container');
    const container = containers[0];
    let count = 0;

    container.innerText = `
        
        Loading...`;

    $('#next').click(function(){
        container.innerText = `
        
        Loading...`;
        count++;

        $.get('/get_coins', function(data){
            container.innerText = '';

            if(data.message){
                container.innerText = data.message + '. Please wait for api request limit';
            }else{
                for(let i=count*10; i<(count+1)*10; i++){
                    if(data[i]){
                        let elem = document.createElement('li');
                        elem.innerText = data[i].name;
                
                        container.appendChild(elem);
                    }else{
                        let elem = document.createElement('li');
                        elem.innerText = 'No data found';
                
                        container.appendChild(elem);
                    }
                }
            }
        }, 'json');
    });

    $('#prev').click(function(){
        container.innerText = `
        
        Loading...`;

        if(count > 0){
            count--;
        }

        $.get('/get_coins', function(data){
            container.innerText = '';

            if(data.message){
                container.innerText = data.message + '. Please wait for api request limit';
            }else{
                for(let i=count*10; i<(count+1)*10; i++){
                    if(data[i]){
                        let elem = document.createElement('li');
                        elem.innerText = data[i].name;
                
                        container.appendChild(elem);
                    }else{
                        let elem = document.createElement('li');
                        elem.innerText = 'No data found';
                
                        container.appendChild(elem);
                    }
                }
            }
        }, 'json');
    });

    $('#top100').click(function(){
        $('#prev , #next').hide();

        container.innerText = `
        
        Loading...`;

        count = 0;

        $.get('/get_coins', function(data){
            container.innerText = '';

            if(data.message){
                container.innerText = data.message + '. Please wait for api request limit';
            }else{
                for(let i=0; i<100; i++){
                    if(data[i]){
                        let elem = document.createElement('li');
                        elem.innerText = data[i].name;
                
                        container.appendChild(elem);
                    }else{
                        let elem = document.createElement('li');
                        elem.innerText = 'No data found';
                
                        container.appendChild(elem);
                    }
                }
            }
        }, 'json');
    });

    $.get('/get_coins', function(data){
        container.innerText = '';

        if(data.message){
            container.innerText = data.message + '. Please wait for api request limit';
        }else{
            for(let i=0; i<10; i++){
                if(data[i]){
                    let elem = document.createElement('li');
                    elem.innerText = data[i].name;
            
                    container.appendChild(elem);
                }else{
                    let elem = document.createElement('li');
                    elem.innerText = 'No data found';
            
                    container.appendChild(elem);
                }
            }
        }
    }, 'json');
});
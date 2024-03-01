let count = 0;

function EmitRandomNumber(){
    count++;

    if(count < 11){
        console.log(`Attempt #${count}. EmitRandomNumber is called.`);
        setTimeout(function(){
            console.log('2 seconds have lapsed.');
    
            let rand = Math.floor(Math.random() * 101);
    
            if(rand >= 80){
                console.log(`Random number generated is ${rand}!!!`);
                console.log('- - - - -');
            }else{
                console.log(`Random number generated is ${rand}.`);
                console.log('- - - - -');
                EmitRandomNumber();
            }
        } , 2000)
    }
}

EmitRandomNumber();
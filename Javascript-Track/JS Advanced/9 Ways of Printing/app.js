// 1
console.log('I love Javascript!!!');

// 2
alert('asdf');

// 3
function print_this(text){
    console.log(text);
}

print_this('wow');

class Printer{
    print(text){
        console.log(text);
    }

    static print_it(text){
        console.log(text);
    }
}

let wow = new Printer();

// 4
wow.print('wow');

// 5
Printer.print_it('wow');

function Printing(){
    this.prints = function(text){
        console.log(text);
    }
}

Printing.prototype.print_wow = function(text){
    console.log(text);
}

let printing = new Printing();

// 6
printing.prints('wow');

// 7
printing.print_wow('wow');

// 8
(function(){
    console.log('wow');
})();

// 9
function closure(){
    let variable = 'wow';

    function printus(){
        console.log(variable);
    }

    printus();
}

closure();
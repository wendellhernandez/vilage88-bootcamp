function Bike(price , maxspeed){
    this.price = price;
    this.maxspeed = maxspeed;
    this.miles = 0;
}

Bike.__proto__.displayinfo = function(){
    console.log(this.price , this.maxspeed , this.miles);

    return this;
}

Bike.__proto__.drive = function(){
    console.log('Driving');
    this.miles += 10;

    return this;
}

Bike.__proto__.reverse = function(){
    if(this.miles > 0){
        console.log('Reversing');
        this.miles -= 5;
    }else{
        console.log('Cannot Reverse');
    }

    return this;
}

let bike1 = new Bike(300 , 80);
let bike2 = new Bike(250 , 50);
let bike3 = new Bike(100 , 30);

bike1.drive().drive().drive().reverse().displayinfo();
bike2.drive().drive().reverse().reverse().displayinfo();
bike3.reverse().reverse().reverse().displayinfo();
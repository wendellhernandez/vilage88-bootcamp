class Bike{
    constructor(price , maxspeed){
        this.price = price;
        this.maxspeed = maxspeed;
        this.miles = 0;
    }

    displayinfo(){
        console.log(this.price , this.maxspeed , this.miles);

        return this;
    }

    drive(){
        console.log('Driving');
        this.miles += 10;

        return this;
    }

    reverse(){
        if(this.miles > 0){
            console.log('Reversing');
            this.miles -= 5;
        }else{
            console.log('Cannot Reverse');
        }

        return this;
    }
}

let bike1 = new Bike(300 , 80);
let bike2 = new Bike(250 , 50);
let bike3 = new Bike(100 , 30);

bike1.drive().drive().drive().reverse().displayinfo();
bike2.drive().drive().reverse().reverse().displayinfo();
bike3.reverse().reverse().reverse().displayinfo();
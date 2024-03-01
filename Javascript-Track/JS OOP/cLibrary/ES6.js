class Circles{
    constructor(number){
        this.number = number;
    }
    
    draw_circles(canvas_id){
        this.canvas = document.getElementById(canvas_id);

        this.circle_maker();
        this.make_circle_smaller();
    }

    circle_maker(){
        for(let i=0; i<this.number; i++){
            let x_axis = Math.ceil(Math.random() * 1100);
            let y_axis = Math.ceil(Math.random() * 600);
            let size = Math.ceil(Math.random() * 100) + 10;
            let elem = document.createElement('p');
            let red = Math.floor(Math.random() * 266);
            let green = Math.floor(Math.random() * 266);
            let blue = Math.floor(Math.random() * 266);
            let background = `rgba(${red}, ${green}, ${blue})`;
    
            elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${background}; border-radius:100vh; border: 1px solid black`);
    
            this.canvas.appendChild(elem);
        }
    }

    make_circle_smaller(){
        setInterval(() => {
            let circles = document.getElementsByTagName('p');
    
            if(circles){
                for(let i=0; i<circles.length; i++){
                    let width = circles[i].style.width;
                    let height = circles[i].style.height;
                    width = Number(width.replace('px' , '')) ;
                    height = Number(height.replace('px' , ''));
    
                    if(width > 200){
                        circles[i].remove();
                    }else{
                        circles[i].style.width = `${width + 1}px`;
                        circles[i].style.height = `${height + 1}px`;
                    }
                }
            }
        } , 50)
    }
}
document.addEventListener('DOMContentLoaded' , () => {
    class Shapes{
        constructor(){
            this.canvas_wrapper = document.getElementById('canvas_wrapper');
            this.reset_button = document.getElementById('reset_button');
            this.bg_choice = document.getElementsByClassName('bg_choice');
            this.shape = document.getElementsByClassName('shape');
            this.shape_active = document.getElementsByClassName('shape active');
            this.background = '#FFE66D';
        }

        active_color_chooser(){
            for(let i=0; i<this.bg_choice.length; i++){
                this.bg_choice[i].addEventListener('click' , () => {
                    for(let i=0; i<this.bg_choice.length; i++){
                        this.bg_choice[i].classList.remove('active');
                    }
        
                    this.background = this.bg_choice[i].dataset.background;
                    this.bg_choice[i].classList.add('active');
                    this.shape_active[0].style['background-color'] = this.background;
                })
            }
        }

        canvas_reset(){
            this.reset_button.addEventListener('click' , () => {
                this.canvas_wrapper.innerHTML = '';
        
                for(let i=0; i<this.bg_choice.length; i++){
                    this.bg_choice[i].classList.remove('active');
                }
        
                this.bg_choice[0].classList.add('active');
                this.background = '#FFE66D';
            })
        }

        shape_chooser(){
            for(let i=0; i<this.shape.length; i++){
                this.shape[i].addEventListener('click' , () => {
                    for(let i=0; i<this.shape.length; i++){
                        this.shape[i].style['background-color'] = 'white';
                        this.shape[i].classList.remove('active');
                    }
        
                    this.shape_type = this.shape[i].dataset.shape;
                    this.shape[i].classList.add('active');
                    this.shape[i].style['background-color'] = this.background;
                })
            }
        }

        make_shape_smaller(){
            setInterval(() => {
                let shape = document.getElementsByTagName('p');
        
                if(shape){
                    for(let i=0; i<shape.length; i++){
                        let width = shape[i].style.width;
                        let height = shape[i].style.height;
                        width = width.replace('px' , '');
                        height = height.replace('px' , '');
        
                        if(width < 1){
                            shape[i].remove();
                        }else{
                            shape[i].style.width = width - 1 + 'px';
                            shape[i].style.height = height - 1 + 'px';
                        }
                    }
                }
            } , 50)
        }
    }

    class Circle extends Shapes{
        constructor(){
            super();
            this.shape_type = 'circle';
        }

        circle_maker(x_axis , y_axis){
            let size = Math.ceil(Math.random() * 190) + 10;
            let elem = document.createElement('p');

            elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${this.background}; border-radius:100vh; border: 4px solid black`);
        
            this.canvas_wrapper.appendChild(elem);
        }
    }

    class Square extends Shapes{
        constructor(){
            super();
        }

        square_maker(x_axis , y_axis){
            let size = Math.ceil(Math.random() * 190) + 10;
            let elem = document.createElement('p');

            elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${this.background}; border: 4px solid black`);
        
            this.canvas_wrapper.appendChild(elem);
        }
    }

    class Diamond extends Shapes{
        constructor(){
            super();
        }

        diamond_maker(x_axis , y_axis){
            let size = Math.ceil(Math.random() * 190) + 10;
            let elem = document.createElement('p');

            elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${this.background}; border: 4px solid black; transform: rotate(45deg)`);
        
            this.canvas_wrapper.appendChild(elem);
        }
    }

    let circle1 = new Circle();
    circle1.canvas_reset();
    circle1.active_color_chooser();
    circle1.shape_chooser();
    circle1.make_shape_smaller();

    let square1 = new Square();
    square1.active_color_chooser();
    square1.shape_chooser();

    let diamond1 = new Diamond();
    diamond1.active_color_chooser();
    diamond1.shape_chooser();

    this.canvas_wrapper.addEventListener('click' , (e) => {
        let x_axis = e.clientX;
        let y_axis = e.clientY;
        
        if(circle1.shape_type == 'circle'){
            circle1.circle_maker(x_axis , y_axis);
        }else if(circle1.shape_type == 'square'){
            square1.square_maker(x_axis , y_axis);
        }else{
            diamond1.diamond_maker(x_axis , y_axis);
        }
    })
})
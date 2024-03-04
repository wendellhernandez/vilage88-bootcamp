document.addEventListener('DOMContentLoaded' , () => {
    class Circle{
        constructor(){
            this.canvas_wrapper = document.getElementById('canvas_wrapper');
            this.reset_button = document.getElementById('reset_button');
            this.bg_choice = document.getElementsByClassName('bg_choice');
            this.background = '#FFE66D';
        }

        active_chooser(obj){
            for(let i=0; i<obj.bg_choice.length; i++){
                obj.bg_choice[i].addEventListener('click' , function() {
                    for(let i=0; i<obj.bg_choice.length; i++){
                        obj.bg_choice[i].classList.remove('active');
                    }
        
                    obj.background = obj.bg_choice[i].dataset.background;
                    obj.bg_choice[i].classList.add('active');
                })
            }
        }

        circle_maker(obj){
            obj.canvas_wrapper.addEventListener('click' , function(e) {
                let x_axis = e.clientX;
                let y_axis = e.clientY;
                let size = Math.ceil(Math.random() * 190) + 10;
                let elem = document.createElement('p');
        
                elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${obj.background}; border-radius:100vh; border: 4px solid black`);
        
                obj.canvas_wrapper.appendChild(elem);
            })
        }

        canvas_reset(obj){
            obj.reset_button.addEventListener('click' , function() {
                obj.canvas_wrapper.innerHTML = '';
        
                for(let i=0; i<obj.bg_choice.length; i++){
                    obj.bg_choice[i].classList.remove('active');
                }
        
                obj.bg_choice[0].classList.add('active');
                obj.background = '#FFE66D';
            })
        }

        make_circle_smaller(obj){
            setInterval(function() {
                let circles = document.getElementsByTagName('p');
        
                if(circles){
                    for(let i=0; i<circles.length; i++){
                        let width = circles[i].style.width;
                        let height = circles[i].style.height;
                        width = width.replace('px' , '');
                        height = height.replace('px' , '');
        
                        if(width < 1){
                            circles[i].remove();
                        }else{
                            circles[i].style.width = width - 1 + 'px';
                            circles[i].style.height = height - 1 + 'px';
                        }
                    }
                }
            } , 50)
        }
    }

    let circle = new Circle();

    circle.active_chooser(circle);
    circle.circle_maker(circle);
    circle.canvas_reset(circle);
    circle.make_circle_smaller(circle);
})
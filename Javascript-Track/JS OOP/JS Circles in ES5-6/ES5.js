document.addEventListener('DOMContentLoaded' , () => {
    function Circle_main(){
        this.canvas_wrapper = document.getElementById('canvas_wrapper');
        this.reset_button = document.getElementById('reset_button');
        this.bg_choice = document.getElementsByClassName('bg_choice');
        this.background = '#FFE66D';

        this.active_chooser = () => {
            for(let i=0; i<this.bg_choice.length; i++){
                this.bg_choice[i].addEventListener('click' , () => {
                    for(let i=0; i<this.bg_choice.length; i++){
                        this.bg_choice[i].classList.remove('active');
                    }
        
                    this.background = this.bg_choice[i].dataset.background;
                    this.bg_choice[i].classList.add('active');
                })
            }
        }

        this.circle_maker = () => {
            this.canvas_wrapper.addEventListener('click' , (e) => {
                let x_axis = e.clientX;
                let y_axis = e.clientY;
                let size = Math.ceil(Math.random() * 190) + 10;
                let elem = document.createElement('p');
        
                elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${this.background}; border-radius:100vh; border: 4px solid black`);
        
                this.canvas_wrapper.appendChild(elem);
            })
        }

        this.canvas_reset = () => {
            this.reset_button.addEventListener('click' , () => {
                this.canvas_wrapper.innerHTML = '';
        
                for(let i=0; i<this.bg_choice.length; i++){
                    this.bg_choice[i].classList.remove('active');
                }
        
                this.bg_choice[0].classList.add('active');
                this.background = '#FFE66D';
            })
        }

        this.make_circle_smaller = () => {
            setInterval(() => {
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

    let circle_main1 = new Circle_main();

    circle_main1.active_chooser();
    circle_main1.circle_maker();
    circle_main1.canvas_reset();
    circle_main1.make_circle_smaller();
})
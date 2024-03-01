document.addEventListener('DOMContentLoaded' , () => {
    const canvas_wrapper = document.getElementById('canvas_wrapper');
    const reset_button = document.getElementById('reset_button');
    const bg_choice = document.getElementsByClassName('bg_choice');

    let background = '#FFE66D';

    for(let i=0; i<bg_choice.length; i++){
        bg_choice[i].addEventListener('click' , () => {
            for(let i=0; i<bg_choice.length; i++){
                bg_choice[i].classList.remove('active');
            }

            background = bg_choice[i].dataset.background;
            bg_choice[i].classList.add('active');
        })
    }

    canvas_wrapper.addEventListener('click' , (e) => {
        let x_axis = e.clientX;
        let y_axis = e.clientY;
        let size = Math.ceil(Math.random() * 190) + 10;
        let elem = document.createElement('p');

        elem.setAttribute('style' , `position:absolute; top:${y_axis-size/2}px; left:${x_axis-size/2}px; width:${size}px; height:${size}px; background-color: ${background}; border-radius:100vh; border: 4px solid black`);

        canvas_wrapper.appendChild(elem);
    })

    reset_button.addEventListener('click' , () => {
        canvas_wrapper.innerHTML = '';

        for(let i=0; i<bg_choice.length; i++){
            bg_choice[i].classList.remove('active');
        }

        bg_choice[0].classList.add('active');
        background = '#FFE66D';
    })

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
})
const $query = function(elem) {
    const obj = {
        element: document.querySelectorAll(elem), 
        click: (func) => {
            let elem = obj.element;

            for(let i=0; i<elem.length; i++){
                elem[i].addEventListener('click' , func);
            }
        },
        hide: () => {
            let elem = obj.element;

            for(let i=0; i<elem.length; i++){
                elem[i].style.display = 'none';
            }
        },
        show: () => {
            let elem = obj.element;

            for(let i=0; i<elem.length; i++){
                elem[i].style.display = 'block';
            }
        }
    }

    return obj;
}
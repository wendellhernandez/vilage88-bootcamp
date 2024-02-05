$(document).ready(function(){
    let delete_button = $(".fa-trash");

    delete_button.on("click" , function(event){
        if(!confirm("Are you sure you want to delete the product?")){
            event.preventDefault();
        }
    })
})
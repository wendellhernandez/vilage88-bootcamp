$(function() {
    $( "#datepicker" ).datepicker();

    $('form').submit(function(){
        let first_name = $('input[placeholder="First Name"]').val();
        let last_name = $('input[placeholder="Last Name"]').val();
        let date = $('input[placeholder="Date"]').val();

        if(first_name === ""){
            alert("First Name can't be blank");
        }else if(!/[a-zA-Z]/.test(first_name)){
            alert("First Name can only have letters");
        }else{
            if(last_name === ""){
                alert("Last Name can't be blank")
            }else if(!/[a-zA-Z]/.test(last_name)){
                alert("Last Name can only have letters");
            }else{
                if(date === ""){
                    alert("Date can't be blank")
                }else{
                    alert(`Success ${first_name} ${last_name}! Your vaccination is reserved on ${date}`);
                }
            }
        }

        return false;
    })
})
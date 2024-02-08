$(document).ready(function(){
    $.get("https://fakerapi.it/api/v1/images?_quantity=100&_type=kittens" , function(json){
        let datas = json.data;
        let img = "";

        datas.forEach((data) => {
            let url = data.url;
            img += `<img src="${url}">`;
        })

        $("body").html(img);
    } , "json");
})
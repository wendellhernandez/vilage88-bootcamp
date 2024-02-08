$(document).ready(function(){
    let html = "";

    for(let i=1; i<=100; i++){
        $.get(`https://api.pokemontcg.io/v2/cards/ex11-${i}` , function(json){
            console.log(json);
            
            let img_small_url = json.data.images.small;
            
            html += `<img src='${img_small_url}' data-card-number='${i}'>`;
    
            $("#card_container").html(html);
        } , "json");
    }

    $("#card_container").on("click" , "img" , function(e){
        let i = $(this).attr("data-card-number");

        $.get(`https://api.pokemontcg.io/v2/cards/ex11-${i}` , function(json){
            let name = json.data.name;
            let img_small_url = json.data.images.small;
            let types = json.data.types;
            let hp = json.data.hp;
            let evolvesFrom = json.data.evolvesFrom;

            html = `
            <img src='${img_small_url}'>
            <h1>${name}</h1>
            <p>TYPES: ${types}</p>
            <p>HP: ${hp}</p>
            <p>EVOLVES FROM: ${evolvesFrom}</p>
            `;

            $("#modal").html(html);

            $("#modal_bg").show();
        } , "json");
    })

    $("#modal_bg").click(function(e){
        $("#modal_bg").hide();
    })
})
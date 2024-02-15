<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
             $(document).ready(function() {
                let html = ``;

                $('form').submit(function() {
                    let user_input = $("#user_input").val();
                    html += `<p><img src="/assets/img/me.png">${user_input}</p>`;
                    $(".chat_container").html(html);

                    $.post($(this).attr('action'), $(this).serialize(), function(res) {
                        html += `<p class="simsimi"><img src="/assets/img/sim.png"> ${res.atext}</p>`;

                        $(".chat_container").html(html);
                    },"json");

                    return false;
                });
            });
        </script>
    </head>
    <body>
        <img src="/assets/img/logo.png">

        <div class="chat_container">
            <p class="simsimi"><img src="/assets/img/sim.png"> Talk to me</p>
        </div>

        <form action="/chatbots/chat" method="post">
            <input id="user_input" name="user_input" type="text" id="user_input" placeholder="Talk to simsimi">
        </form>
    </body>
</html>
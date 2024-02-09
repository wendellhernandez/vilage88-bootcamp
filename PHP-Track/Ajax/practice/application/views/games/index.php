<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('form').submit(function() {
                    // load up any gif you want, this will be shown while user is waiting for response
                
                    $.post($(this).attr('action'), $(this).serialize(), function(res) {
                
                        var html_string = "";
                        if(res.length !== 0) {
                            html_string = "<img src='" + res.screenshots[0].image + "'/>";
                        } else {
                            html_string = "Not Found";
                        }
                        $("#results").html(html_string);
                    },"json");
                

                    return false;   // don't forget, without this, the page will refresh
                });
            });
        </script>
    </head>
    <body>
        <h1>Free Games</h1>
        <form action="/games/search" method="post">
            <label for="user_input">Enter Game ID:</label>
            <input id="user_input" name="user_input" type="search">
            <input type="submit" value="search">
        </form>
        <div id="results"></div>
    </body>
</html>
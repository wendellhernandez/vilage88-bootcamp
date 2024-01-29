<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Raffle</title>
        <style>
            body{
                background-color: #333;
                text-align: center;
                color: white;
                font-family: Arial, Helvetica, sans-serif;
            }
            div{
                background-color: #0866FF;
                padding: 20px 30px;
                width: 400px;
                margin: 0 auto;
                margin-bottom: 30px;
                font-size: 4rem;
                font-weight: bold;
            }
            span{
                color: yellow;
            }
        </style>
    </head>
    <body>
        <h1>There are <span><?= $count ?></span> lucky winners selected</h1>
        <div><?= $random ?></div>
        <form action="raffle/pick/" method="post">
            <input type="submit" value="Pick more">
        </form>
    </body>
</html>
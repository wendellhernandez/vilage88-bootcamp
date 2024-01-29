<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>World</title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
    <?php
        for($i=0; $i<$count; $i++){
    ?>
            <img src="/assets/ninja<?= rand(1,5) ?>.png" alt="ninja man">
    <?php
        }
    ?>
    </body>
</html>
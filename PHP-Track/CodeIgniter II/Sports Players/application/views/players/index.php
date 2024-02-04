<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sports Players</title>
        <script src="https://kit.fontawesome.com/02987b8fb9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <main>
            <!-- Section Container for filtering users -->
            <form action="/" method="get">
                <p class="search_title">Filter Users</p>

                <!-- Filter input for player name -->
                <input type="text" name="name_filter" placeholder="Player Name" class="name_filter">

                <!-- Filter checkbox for gender -->
                <p class="sub_title">Gender</p>
                <input type="checkbox" name="gender[]" value="female" id="female">
                <label for="female">Female</label>
                <input type="checkbox" name="gender[]" value="male" id="male">
                <label for="male">Male</label>

                <!-- Filter checkbox for sports -->
                <p class="sub_title">Sports</p>
<?php 
    /* Uses a foreach loop to load the sports in the database */
    foreach($sports as $sport){
?>
                <input type="checkbox" name="sports[]" value="<?= $sport["name"] ?>" id="<?= $sport["name"] ?>">
                <label for="<?= $sport["name"] ?>"><?= $sport["name"] ?></label>
<?php
    }
?>
                <!-- Submit button -->
                <input type="submit" value="Search" class="submit_button">
            </form>

            <!-- Container for Showing filtered player image and names -->
            <div class="players_section">
<?php 
    /* Uses a foreach loop to load the players in the database */
    foreach($players as $player){
?>
                <div class="player_card">
                    <img src="<?= $player["image"] ?>">
                    <p><?= $player["player_name"] ?></p>
                    <p class="sports_played"><?= $player["sport_name"] ?></p>
                </div>
<?php
    }
?>
            </div>
        </main>
    </body>
</html>
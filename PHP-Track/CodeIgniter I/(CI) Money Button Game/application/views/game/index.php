<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>
        <span>Your Money: <?= $this->session->userdata('money') ?></span>
        <form action="game/reset"  method="post">
            <input type="submit" name="reset_button" value="Reset Game">
        </form>
    </header>
    <main>
        <div class="bet_container" id="low_risk">
            <h1>Low <span>Risk</span>!</h1>
            <form action="game/bet" method="post">
                <input type="hidden" name="risk" value="20">
                <input type="hidden" name="risk_type" value="Low Risk">
                <input type="hidden" name="reward" value="100">
                <input type="hidden" name="penalty" value="25">
                <input type="submit" value="BET">
            </form>
            <p>by -25 up to 100</p>
        </div>
        <div class="bet_container" id="moderate_risk">
            <h1>Moderate <span>Risk</span>!</h1>
            <form action="game/bet" method="post">
                <input type="hidden" name="risk" value="40">
                <input type="hidden" name="risk_type" value="Moderate Risk">
                <input type="hidden" name="reward" value="1000">
                <input type="hidden" name="penalty" value="500">
                <input type="submit" value="BET">
            </form>
            <p>by -500 up to 1000</p>
        </div>
        <div class="bet_container" id="high_risk">
            <h1>High <span>Risk</span>!</h1>
            <form action="game/bet" method="post">
                <input type="hidden" name="risk" value="60">
                <input type="hidden" name="risk_type" value="High Risk">
                <input type="hidden" name="reward" value="4000">
                <input type="hidden" name="penalty" value="2500">
                <input type="submit" value="BET">
            </form>
            <p>by -2500 up to 4000</p>
        </div>
        <div class="bet_container" id="severe_risk">
            <h1>Severe <span>Risk</span>!</h1>
            <form action="game/bet" method="post">
                <input type="hidden" name="risk" value="80">
                <input type="hidden" name="risk_type" value="Severe Risk">
                <input type="hidden" name="reward" value="12000">
                <input type="hidden" name="penalty" value="11000">
                <input type="submit" value="BET">
            </form>
            <p>by -11000 up to 12000</p>
        </div>
    </main>
    <div class="host_container">
        <span>Game Host:</span>
        <div class="game_log">
<?php
    if(!empty($this->session->userdata('game_data'))){
        foreach($this->session->userdata('game_data') as $log){ ?>
            <p class="player_<?= $log['status'] ?>">[<?= $log['date'] ?>] You BET <?= $log['risk_type'] ?>. <?= $log['value'] ?>. Your current money now is <?= $log['money'] ?></p>
<?php   }
    }    
?>
        </div>
    </div>
</body>
</html>
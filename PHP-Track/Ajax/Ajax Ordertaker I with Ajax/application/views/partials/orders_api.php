<?php
    for($i=1; $i<=count($orders); $i++){
?>
        <div class="order_container">
            <div class="order_number"><?= $i ?></div>
            <p><?= $orders[$i-1]["order"] ?></p>
        </div>
<?php
    }
?>
            <div class="table_head">Item Name</div>
            <div class="table_head">Number of stock</div>
            <div class="table_head">Price</div>
            <div class="table_head">Date Added</div>
<?php
    foreach($items as $item){
        $row++
?>
            <div class="table_bg_<?= $row%2 ?>"><?= $item["name"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $item["stock"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $item["price"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $item["date_added"] ?></div>
<?php
    }
?>
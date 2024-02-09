            <div class="table_head">Item Name</div>
            <div class="table_head">Number of stock</div>
            <div class="table_head">Price</div>
            <div class="table_head">Date Added</div>
<?php
    for($i=5*($page-1); $i<5*$page; $i++){
        $row++;

        if(!empty($items[$i])){
?>
            <div class="table_bg_<?= $row%2 ?>"><?= $items[$i]["name"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $items[$i]["stock"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $items[$i]["price"] ?></div>
            <div class="table_bg_<?= $row%2 ?>"><?= $items[$i]["date_added"] ?></div>
<?php 
        }
    }
?>
        <div class="pagination_container">
<?php
    for($i=1; $i<=ceil(count($items)/5); $i++){
        $hidden["page"] = $i;
?>
            <?= form_open("/items/filter" , "class='form_page'" , $hidden) ?>
                <input type="submit" value="<?= $i ?>">
            <?= form_close() ?>
<?php 
    }
?>
        </div>
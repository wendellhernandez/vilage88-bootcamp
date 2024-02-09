<?php
    for($i=1; $i<=count($orders); $i++){
?>
            <div class="order_container">
                <div class="order_number"><?= $i ?></div>
                <p class="order_title"><?= $orders[$i-1]["order"] ?></p>
                <form action="/orders/update/<?= $orders[$i-1]['id'] ?>">
                    <textarea name="order"><?= $orders[$i-1]["order"] ?></textarea>
                </form>
                <form action="/orders/delete/<?= $orders[$i-1]['id'] ?>" class="form_delete">
                    <button type="submit"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
<?php
    }
?>
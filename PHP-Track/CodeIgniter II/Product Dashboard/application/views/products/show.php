        <div class="product_showcase">
            <!-- 
            DOCU: This shows all the product details

            Owner: Wendell
             -->
            <h1><?= $product["name"] ?> ($<?= $product["price"] ?>)</h1>
            <p><span>Added since:</span> <?= $product["date"] ?></p>
            <p><span>Product ID:</span> #<?= $product["id"] ?></p>
            <p><span>Description:</span> <?= $product["description"] ?></p>
            <p><span>Total sold:</span> <?= $product["quantity_sold"] ?></p>
            <p><span>Available stocks:</span> <?= $product["inventory_count"] ?></p>

            <!-- 
            DOCU: This shows all the reviews.
            Clicking the post button directs to /reviews/add_review/[product_id] route.

            Owner: Wendell
             -->
            <p class="review_section_title">Leave a Review</p>

            <?= form_open("/reviews/add_review/{$product["id"]}") ?>
                <textarea name="review" id="review" class="review_textbox"></textarea>
                <input type="submit" value="POST">
            </form>
<?php
    foreach($reviews as $review){
?>
            <div class="review_container">
                <div><?= $review["user_name"] ?> <?= $time_diff ?><span><?= $review["review_time"] ?></span></div>
                <p><?= $review["user_review"] ?></p>

                <!-- 
                DOCU: This shows all the replies to this specific review.
                Clicking the reply button directs to /reviews/add_review route.

                Owner: Wendell
                -->
<?php
        foreach($replies as $reply){
            if($reply["reply_review_id"] == $review["review_id"]){
?>
                <div class="reply_container">
                    <div><?= $reply["user_name"] ?> <span><?= $reply["reply_time"] ?></span></div>
                    <p><?= $reply["user_reply"] ?></p>
                </div>
<?php   
            }
        }
?>
                <?= form_open("/reviews/add_reply/{$review["review_id"]}/{$product["id"]}") ?>
                    <textarea name="reply" id="reply" class="reply_textbox"></textarea>
                    <input type="submit" value="REPLY">
                </form>
            </div>
<?php
    }
?>
        </div>
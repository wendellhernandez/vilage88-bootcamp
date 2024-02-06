        <div class="product_showcase">
            <!-- 
            DOCU: This shows all the product details

            Owner: Wendell
             -->
            <h1>V88 T-shirt ($250)</h1>
            <p><span>Added since:</span> December 20th 2021</p>
            <p><span>Product ID:</span> #1</p>
            <p><span>Description:</span> Legit, comfortable V88 t-shirt available in Legit, comfortable V88 t-shirt available in Legit, comfortable V88 t-shirt available in Legit, comfortable V88 t-shirt available in Legit, comfortable V88 t-shirt available in any size</p>
            <p><span>Total sold:</span> 100</p>
            <p><span>Available stocks:</span> 120</p>

            <!-- 
            DOCU: This shows all the reviews.
            Clicking the post button directs to /reviews/add_review route.

            Owner: Wendell
             -->
            <p class="review_section_title">Leave a Review</p>

            <?= form_open("/reviews/add_review" , "" , array("product_id" => 1)) ?>
                <textarea name="review" id="review" class="review_textbox"></textarea>
                <input type="submit" value="POST">
            </form>

            <div class="review_container">
                <div>Mam Karen <span>7 hours ago</span></div>
                <p>Super cute! Will buy again.</p>

                <!-- 
                DOCU: This shows all the replies to this specific review.
                Clicking the reply button directs to /reviews/add_review route.

                Owner: Wendell
                -->
                <div class="reply_container">
                    <div>Mam Karen <span>5 hours ago</span></div>
                    <p>Super cute! Will buy again.</p>
                </div>

                <div class="reply_container">
                    <div>Mam Karen <span>23 minutes ago</span></div>
                    <p>Super cute! Will buy again.</p>
                </div>

                <?= form_open("/reviews/add_reply/[review_id]" , "" , array("product_id" => 1)) ?>
                    <textarea name="reply" id="reply" class="reply_textbox"></textarea>
                    <input type="submit" value="REPLY">
                </form>
            </div>

            <div class="review_container">
                <div>Mam Karen <span>7 hours ago</span></div>
                <p>Super cute! Will buy again.</p>

                <div class="reply_container">
                    <div>Mam Karen <span>5 hours ago</span></div>
                    <p>Super cute! Will buy again.</p>
                </div>

                <div class="reply_container">
                    <div>Mam Karen <span>23 minutes ago</span></div>
                    <p>Super cute! Will buy again.</p>
                </div>

                <?= form_open("/reviews/add_reply" , "" , array("product_id" => 1)) ?>
                    <textarea name="reply" id="reply" class="reply_textbox"></textarea>
                    <input type="submit" value="REPLY">
                </form>
            </div>
        </div>
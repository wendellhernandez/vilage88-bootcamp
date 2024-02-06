            <div class="dashboard_title">
                <p>All Products</p>
            </div>

            <!-- 
            DOCU: This shows all the products added by the admin.
            All users can click on the product name to show more detail or comment which goes to /products/show/[product_id].

            Owner: Wendell
             -->
            <div class="products_table">
                <div class="product_header">
                    <p class="id_section">ID</p>
                    <p class="name_section">Name</p>
                    <p>Inventory Count</p>
                    <p>Quantity Sold</p>
                </div>
<?php
    foreach($products as $product){
        $row++
?>
                <div class="bg_row_<?= $row%2 ?>">
                    <p class="id_section"><?= $product["id"] ?></p>
                    <p class="name_section"><a href="/products/show/<?= $product["id"] ?>"><?= $product["name"] ?></a></p>
                    <p><?= $product["inventory_count"] ?></p>
                    <p><?= $product["quantity_sold"] ?></p>
                </div>
<?php
    }
?>
            </div>
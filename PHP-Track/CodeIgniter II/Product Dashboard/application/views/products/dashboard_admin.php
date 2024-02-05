            <!-- 
            DOCU: An admin can add new products by clicking the add new product button that redirects to /products/new route.
            An admin can also edit and remove product by clicking the edit and remove buttons which redirects to /products/edit/[product_id] and /products/remove/[product_id].

            Owner: Wendell
             -->
            <div class="dashboard_title">
                <p>Manage Products</p>
                <a href="/products/new">Add New Product</a>
            </div>

            <!-- 
            DOCU: This shows all the products added by the admin.
            An admin can also edit and remove product by clicking the edit and remove buttons which redirects to /products/edit/[product_id] and /products/remove/[product_id].
            All users can click on the product name to show more detail or comment which goes to /products/show/[product_id].

            Owner: Wendell
             -->
            <div class="products_table">
                <div class="product_header">
                    <p class="id_section">ID</p>
                    <p class="name_section">Name</p>
                    <p>Inventory Count</p>
                    <p>Quantity Sold</p>
                    <p>Action</p>
                </div>
                <div>
                    <p class="id_section">ID</p>
                    <p class="name_section"><a href="/products/show/[product_id]">Name</a></p>
                    <p>Inventory Count</p>
                    <p>Quantity Sold</p>
                    <p>
                        <a href="/products/edit/[product_id]"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/products/edit/[product_id]"><i class="fa-solid fa-trash"></i></a>
                    </p>
                </div>
                <div class="bg_row_0">
                    <p class="id_section">ID</p>
                    <p class="name_section"><a href="/products/show/[product_id]">Name</a></p>
                    <p>Inventory Count</p>
                    <p>Quantity Sold</p>
                    <p>
                        <a href="/products/edit/[product_id]"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/products/edit/[product_id]"><i class="fa-solid fa-trash"></i></a>
                    </p>
                </div>
            </div>
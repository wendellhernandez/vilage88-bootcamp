         <!-- 
        DOCU: An admin can go back to dashboard by clicking the Return to Dashboard button that redirects to /dashboard/admin route.

        Owner: Wendell
            -->
        <div class="dashboard_title">
            <p>Add a new product</p>
            <a href="/dashboard/admin">Return to Dashboard</a>
        </div>

        <!-- 
        DOCU: This is the Add Product Form.
        Transfers to the /products/add_product route when the add product button is clicked.

        Owner: Wendell
         -->
         <div class="form_container">
            <?= form_open("/products/add_product") ?>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5"></textarea>
                <label for="price">Price</label>
                <input type="number" name="price" id="price">
                <label for="inventory_count">Inventory Count</label>
                <input type="number" name="inventory_count" id="inventory_count" value="1">
                <input type="submit" value="ADD PRODUCT">
            </form>
        </div>
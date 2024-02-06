         <!-- 
        DOCU: An admin can go back to dashboard by clicking the Return to Dashboard button that redirects to /dashboard/admin route.

        Owner: Wendell
            -->
        <div class="dashboard_title">
            <p>Edit Product #1</p>
            <a href="/dashboard/admin">Return to Dashboard</a>
        </div>

        <!-- 
        DOCU: This is the Edit Product Form.
        Goes to the /products/edit_product/[product id] route when the save button is clicked.

        Owner: Wendell
         -->
         <div class="form_container">
            <?= form_open("/products/edit_product/[product id]") ?>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="product name">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5">description</textarea>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="300">
                <label for="inventory_count">Inventory Count</label>
                <input type="number" name="inventory_count" id="inventory_count" value="4">
                <input type="submit" value="SAVE">
            </form>
        </div>
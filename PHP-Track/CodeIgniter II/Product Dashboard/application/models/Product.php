<?php
    class Product extends CI_Model{
        /*
        DOCU: Validates user inputs.
        Sets session validation_errors if there is invalid input.
        Calls add_product() if input is valid then redirects to /products/new route.

        Owner: Wendell
        */
        public function validate_product_add(){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

            $this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required|is_natural_no_zero');

            if(!$this->form_validation->run()){
                $validation_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("validation_errors" , $validation_errors);
            }else{
                $this->add_product();

                $this->session->set_flashdata("validation_errors" , "<div class='register_success'>New Product Added</div>");
            }

            redirect("/products/new");
        }

        /*
        DOCU: Adds product to products table in the database.

        Owner: Wendell
        */
        public function add_product(){
            $name = $this->input->post("name" , TRUE);
            $description = $this->input->post("description" , TRUE);
            $price = $this->input->post("price" , TRUE);
            $inventory_count = $this->input->post("inventory_count" , TRUE);
            $quantity_sold = 80;

            $query = "INSERT INTO products (name , description , price , inventory_count , quantity_sold) VALUES (? , ? , ? , ? , ?)";

            $this->db->query($query , array($name , $description , $price , $inventory_count , $quantity_sold));
        }

        /*
        DOCU: Gets all product from the database.

        Owner: Wendell
        */
        public function get_products(){
            $query = "SELECT * FROM products";

            return $this->db->query($query)->result_array();
        }

        /*
        DOCU: Gets product from the database with specific ID.

        Owner: Wendell
        */
        public function get_product_by_id($id){
            $query = "SELECT * , date_format(created_at , '%M %d, %Y') AS date FROM products WHERE id = ?";

            return $this->db->query($query , array($id))->row_array();
        }

        /*
        DOCU: Validates user inputs.
        Sets session validation_errors if there is invalid input.
        Calls edit_product_by_id($product_id) if input is valid then redirects to /products/edit/$product_id route.

        Owner: Wendell
        */
        public function validate_product_edit($product_id){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

            $this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required|is_natural_no_zero');

            if(!$this->form_validation->run()){
                $validation_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("validation_errors" , $validation_errors);
            }else{
                $this->edit_product_by_id($product_id);

                $this->session->set_flashdata("validation_errors" , "<div class='register_success'>Product Edit Successful</div>");
            }

            redirect("/products/edit/$product_id");
        }

        /*
        DOCU: Edit product from the database with specific ID.

        Owner: Wendell
        */
        public function edit_product_by_id($product_id){
            $name = $this->input->post("name" , TRUE);
            $description = $this->input->post("description" , TRUE);
            $price = $this->input->post("price" , TRUE);
            $inventory_count = $this->input->post("inventory_count" , TRUE);

            $query = "UPDATE products SET name = ? , description = ? , price = ? , inventory_count = ? WHERE id = ?;";

            $this->db->query($query , array($name , $description , $price , $inventory_count , $product_id));
        }

        /*
        DOCU: Remove product from the database with specific ID.

        Owner: Wendell
        */
        public function remove_product($product_id){
            $query = "DELETE FROM products WHERE id = ?;";

            $this->db->query($query , array($product_id));
        }
    }
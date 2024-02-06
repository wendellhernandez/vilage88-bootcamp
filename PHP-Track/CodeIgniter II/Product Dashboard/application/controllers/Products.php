<?php
    class Products extends CI_Controller{
        /*
        DOCU: This function is triggered by the /dashboard/admin route.
        This loads the products/dashboard_admin view which shows all the products which only the admin can edit or remove

        Owner: Wendell
        */
        public function dashboard_admin(){
            $this->admin_login_check();

            $products = $this->product->get_products();

            $data = array(
                "products" => $products,
                "row" => 0
            );

            $this->load->view("partials/header" , $data);
            $this->load->view("products/dashboard_admin");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /dashboard route.
        This loads the products/dashboard view which shows all the products to users

        Owner: Wendell
        */
        public function dashboard(){
            $this->user_login_check();

            $products = $this->product->get_products();

            $data = array(
                "products" => $products,
                "row" => 0
            );

            $this->load->view("partials/header" , $data);
            $this->load->view("products/dashboard");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/new route.
        This loads the products/new view which the admin can add new products.

        Owner: Wendell
        */
        public function new(){
            $this->admin_login_check();

            $data = array(
                "validation_errors" => $this->session->flashdata("validation_errors")
            );

            $this->load->view("partials/header" , $data);
            $this->load->view("products/new");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/add_product route.
        This call the validate_registration() function to validate inputs.

        Owner: Wendell
        */
        public function add(){
            $this->admin_login_check();

            $this->product->validate_product_add();
        }

        /*
        DOCU: This function is triggered by the /products/edit/[product id] route.
        This loads the products/edit view which the admin can edit products.
        This takes the $product_id variable which is sent to the products/edit view.

        Owner: Wendell
        */
        public function edit($product_id){
            $this->admin_login_check();

            $product = $this->product->get_product_by_id($product_id);

            $data = array(
                "product" => $product,
                "validation_errors" => $this->session->flashdata("validation_errors")
            );

            $this->load->view("partials/header");
            $this->load->view("products/edit" , $data);
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/edit_product route.
        Uses the validate_product_edit($product_id) function to validate user inputs and edit the database

        Owner: Wendell
        */
        public function edit_product($product_id){
            $this->admin_login_check();

            $this->product->validate_product_edit($product_id);
        }

        /*
        DOCU: This function is triggered by the /products/remove/[product id] route.
        Removes product with the product id given in the form.
        Then redirects to /dashboard/admin route.

        Owner: Wendell
        */
        public function remove($product_id){
            $this->admin_login_check();

            $this->product->remove_product($product_id);

            redirect("/dashboard/admin");
        }

        /*
        DOCU: This function is triggered by the /products/show/[product id] route.
        This loads the products/show view which shows the details for the specific product chosen.
        Users can leave a review or reply to reviews.
        This takes the $product_id variable which is sent to the products/show view.

        Owner: Wendell
        */
        public function show($product_id){
            $this->user_login_check();

            date_default_timezone_get();

            $product = $this->product->get_product_by_id($product_id);
            $reviews = $this->review->get_reviews_by_product_id($product_id);
            $replies = $this->review->get_replies_by_product_id($product_id);

            if($reviews[0]["day"] > 0){
                $time_diff = $reviews[0]["day"] . "day/s ago";
            }else if($reviews[0]["hour"] > 0){
                $time_diff = $reviews[0]["hour"] . "hour/s ago";
            }else if($reviews[0]["min"] > 0){
                $time_diff = $reviews[0]["min"] . "min/s ago";
            }else{
                $time_diff = $reviews[0]["sec"] . "secs ago";
            }

            $data = array(
                "product" => $product,
                "reviews" => $reviews,
                "replies" => $replies,
                "time_diff" => $time_diff
            );

            $this->load->view("partials/header");
            $this->load->view("products/show" , $data);
            $this->load->view("partials/footer");
        }

        /*
        DOCU: Checks if user is logged in and an Admin.
        redirect to /login if not logged in.
        redirect to /dashboard route if not admin.

        Owner: Wendell
        */
        public function admin_login_check(){
            if(empty($this->session->userdata("user_id"))){
                redirect("/");
            }

            $user = $this->user->get_user_by_id($this->session->userdata("user_id"));

            if($user["user_level"] < 2){
                redirect("/dashboard");
            }
        }

        /*
        DOCU: Checks if user is logged in.
        redirect to /login if not logged in.

        Owner: Wendell
        */
        public function user_login_check(){
            if(empty($this->session->userdata("user_id"))){
                redirect("/");
            }
        }
    }
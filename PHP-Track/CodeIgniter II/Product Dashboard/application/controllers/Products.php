<?php
    class Products extends CI_Controller{
        /*
        DOCU: This function is triggered by the /dashboard/admin route.
        This loads the products/dashboard_admin view which shows all the products which only the admin can edit or remove

        Owner: Wendell
        */
        public function dashboard_admin(){
            $this->load->view("partials/header");
            $this->load->view("products/dashboard_admin");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /dashboard route.
        This loads the products/dashboard view which shows all the products to users

        Owner: Wendell
        */
        public function dashboard(){
            $this->load->view("partials/header");
            $this->load->view("products/dashboard");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/new route.
        This loads the products/new view which the admin can add new products.

        Owner: Wendell
        */
        public function new(){
            $this->load->view("partials/header");
            $this->load->view("products/new");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/edit/[product id] route.
        This loads the products/edit view which the admin can edit products.
        This takes the $product_id variable which is sent to the products/edit view.

        Owner: Wendell
        */
        public function edit($product_id){
            $data = array(
                "product_id" => $product_id
            );

            $this->load->view("partials/header");
            $this->load->view("products/edit" , $data);
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /products/show/[product id] route.
        This loads the products/show view which shows the details for the specific product chosen.
        Users can leave a review or reply to reviews.
        This takes the $product_id variable which is sent to the products/show view.

        Owner: Wendell
        */
        public function show($product_id){
            $data = array(
                "product_id" => $product_id
            );

            $this->load->view("partials/header");
            $this->load->view("products/show" , $data);
            $this->load->view("partials/footer");
        }
    }
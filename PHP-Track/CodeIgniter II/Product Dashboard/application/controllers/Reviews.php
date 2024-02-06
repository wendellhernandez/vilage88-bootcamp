<?php
    class Reviews extends CI_Controller{
        /*
        DOCU: Redirects to /products/show/$product_id if review is empty.
        Call set_review($product_id) function to add review to that specific product.
        Then redirects back to /products/show/$product_id.

        Owner: Wendell
        */
        public function add_review($product_id){
            $this->user_login_check();

            if(empty($this->input->post("review" , TRUE))){
                redirect("/products/show/$product_id");
            }

            $this->review->set_review($product_id);

            redirect("/products/show/$product_id");
        }

        /*
        DOCU: Redirects to /products/show/$product_id if reply is empty.
        Call set_reply($review_id) function to add reply to that specific review.
        Then redirects back to /products/show/$product_id.

        Owner: Wendell
        */
        public function add_reply($review_id , $product_id){
            $this->user_login_check();

            if(empty($this->input->post("reply" , TRUE))){
                redirect("/products/show/$product_id");
            }

            $this->review->set_reply($review_id , $product_id);

            redirect("/products/show/$product_id");
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
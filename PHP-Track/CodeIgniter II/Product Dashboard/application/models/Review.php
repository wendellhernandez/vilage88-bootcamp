<?php
    class Review extends CI_Model{
        /*
        DOCU: Adds review to this specific product.

        Owner: Wendell
        */
        public function set_review($product_id){
            $user_id = $this->session->userdata("user_id");
            $review = $this->input->post("review" , TRUE);

            $query = "INSERT INTO reviews (product_id , user_id , review) VALUES (? , ? , ?)";

            $this->db->query($query , array($product_id , $user_id , $review));
        }

        /*
        DOCU: Gets all the review,users and product info for this specific product.

        Owner: Wendell
        */
        public function get_reviews_by_product_id($product_id){
            $query = "SELECT reviews.id AS review_id , concat(users.first_name , ' ' , users.last_name) AS user_name , date_format(reviews.created_at , '%M %d, %Y') AS review_date , reviews.review AS user_review , 
            (date_format(now() , '%s') - date_format(reviews.created_at , '%s')) AS sec , 
            (date_format(now() , '%i') - date_format(reviews.created_at , '%i')) AS min , 
            (date_format(now() , '%H') - date_format(reviews.created_at , '%H')) AS hour , 
            (date_format(now() , '%d') - date_format(reviews.created_at , '%d')) AS day
            FROM reviews 
            LEFT JOIN users ON reviews.user_id = users.id
            LEFT JOIN products ON reviews.product_id = products.id
            WHERE product_id = $product_id
            ORDER BY review_date DESC , day , hour , min , sec
            ";

            return $this->db->query($query)->result_array();
        }

        /*
        DOCU: Adds review to this specific product.

        Owner: Wendell
        */
        public function set_reply($review_id , $product_id){
            $user_id = $this->session->userdata("user_id");
            $reply = $this->input->post("reply" , TRUE);

            $query = "INSERT INTO replies (product_id , review_id , user_id , reply) VALUES (? , ? , ? , ?)";

            $this->db->query($query , array($product_id , $review_id , $user_id , $reply));
        }

        /*
        DOCU: Gets all the replies,users and review info for this specific review.

        Owner: Wendell
        */
        public function get_replies_by_product_id($product_id){
            $query = "SELECT replies.review_id AS reply_review_id , concat(users.first_name , ' ' , users.last_name) AS user_name , date_format(replies.created_at , '%M %d, %Y') AS reply_date , replies.reply AS user_reply , 
            (date_format(now() , '%s') - date_format(replies.created_at , '%s')) AS sec , 
            (date_format(now() , '%i') - date_format(replies.created_at , '%i')) AS min , 
            (date_format(now() , '%H') - date_format(replies.created_at , '%H')) AS hour , 
            (date_format(now() , '%d') - date_format(replies.created_at , '%d')) AS day
            FROM replies 
            LEFT JOIN users ON replies.user_id = users.id
            WHERE replies.product_id = $product_id
            ORDER BY reply_date , day DESC , hour DESC , min DESC , sec DESC
            ";

            return $this->db->query($query)->result_array();
        }
    }
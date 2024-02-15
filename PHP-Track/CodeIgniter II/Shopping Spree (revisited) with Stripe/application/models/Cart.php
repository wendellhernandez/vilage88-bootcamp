<?php
    class Cart extends CI_Model{
        public function add_to_cart($id , $quantity){
            $sql = "INSERT INTO cart(product_id , quantity) VALUES(? , ?)";

            $this->db->query($sql , array($id , $quantity));
        }

        public function get_cart_products(){
            $sql = "SELECT product_id , name , sum(quantity) AS quantity , price
                FROM cart 
                INNER JOIN products 
                ON cart.product_id = products.id
                GROUP BY product_id
                ";

            return $this->db->query($sql)->result_array();
        }
        
        public function remove_from_cart($id){
            $sql = "DELETE FROM cart WHERE product_id = ?";

            $this->db->query($sql , array($id));
        }
    }
?>
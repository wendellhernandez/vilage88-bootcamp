<?php
    class Product extends CI_Model{
        public function get_products(){
            $sql = "SELECT * FROM products";

            return $this->db->query($sql)->result_array();
        }
    }
?>
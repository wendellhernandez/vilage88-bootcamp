<?php
    class Order extends CI_Model{
        public function get_orders(){
            $query = "SELECT * FROM orders";

            return $this->db->query($query)->result_array();
        }

        public function set_order($orders){
            $query = "INSERT INTO `orders` (`order`) VALUES (?);";
            $data = array($orders["order"]);
            
            return $this->db->query($query , $data);
        }
    }
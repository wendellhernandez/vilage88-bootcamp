<?php
    class Order extends CI_Model{
        public function get_orders(){
            $query = "SELECT * FROM `orders`";

            return $this->db->query($query)->result_array();
        }

        public function set_order($orders){
            $query = "INSERT INTO `orders` (`order`) VALUES (?);";
            $data = array($orders["order"]);
            
            return $this->db->query($query , $data);
        }

        public function update_order($orders){
            $query = "UPDATE `orders` SET `order` = ? WHERE `id` = ?;";
            $data = array($orders["order"] , $orders["order_id"]);
            
            return $this->db->query($query , $data);
        }

        public function delete_order($orders_id){
            $query = "DELETE FROM `orders` WHERE id = ?;";
            $data = array($orders_id);
            
            return $this->db->query($query , $data);
        }
    }
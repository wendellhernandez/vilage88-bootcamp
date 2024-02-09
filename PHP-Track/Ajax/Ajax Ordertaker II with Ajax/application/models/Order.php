<?php
    class Order extends CI_Model{
        public function get_orders(){
            $query = "SELECT * FROM `orders` ORDER BY `created_at`";

            return $this->db->query($query)->result_array();
        }

        public function set_order($order){
            $query = "INSERT INTO `orders` (`order`) VALUES (?);";
            
            return $this->db->query($query , array($order));
        }

        public function update_order($order , $order_id){
            $query = "UPDATE `orders` SET `order` = ? WHERE `id` = ?;";
            
            return $this->db->query($query , array($order , $order_id));
        }

        public function delete_order($orders_id){
            $query = "DELETE FROM `orders` WHERE `id` = ?;";
            $data = array($orders_id);
            
            return $this->db->query($query , $data);
        }
    }
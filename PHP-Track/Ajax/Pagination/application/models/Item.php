<?php
    class Item extends CI_Model{
        public function get_filtered_items(){
            $name = $this->input->post("name" , TRUE);
            $min = $this->input->post("min" , TRUE);
            $max = $this->input->post("max" , TRUE);
            $order = $this->input->post("order" , TRUE);

            if(empty($min)){
                $min = 0;
            }
            if(empty($max)){
                $max = 999;
            }

            $query = 
            "SELECT * , date_format(created_at , '%Y-%m-%d') AS date_added 
            FROM items
            WHERE name LIKE '%$name%'
            AND (price BETWEEN $min AND $max)
            ORDER BY price $order;
            ";

            return $this->db->query($query)->result_array();
        }
    }
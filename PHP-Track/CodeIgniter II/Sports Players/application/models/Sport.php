<?php
    class Sport extends CI_Model{
        /* Get all sports from database */
        public function get_sports(){
            $sql = "SELECT id , name FROM sports";

            return $this->db->query($sql)->result_array();
        }
    }
?>
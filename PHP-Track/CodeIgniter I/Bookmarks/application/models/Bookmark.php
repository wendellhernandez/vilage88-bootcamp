<?php
    class Bookmark extends CI_Model{
        public function add_bookmark($name , $url , $folder){
            $sql = "INSERT INTO bookmarks(name , url , folder) VALUES(? , ? , ?)";
            $this->db->query($sql , array($name , $url , $folder));
        }

        public function get_bookmarks(){
            $sql = "SELECT * FROM bookmarks";

            return $this->db->query($sql)->result_array();
        }

        public function get_bookmark_by_id($id){
            $sql = "SELECT * FROM bookmarks WHERE id = ?";
            
            return $this->db->query($sql , array($id))->row_array();
        }

        public function delete_bookmark($id){
            $sql = "DELETE FROM bookmarks WHERE id = ?";
            
            $this->db->query($sql , array($id));
        }
    }
?>
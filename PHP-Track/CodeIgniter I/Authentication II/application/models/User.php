<?php
    class User extends CI_Model{
        public function set_user($first_name , $last_name , $contact_number , $password){
            $sql = "INSERT INTO users (first_name , last_name , contact_number , password) VALUES (?,?,?,?)";

            $password = password_hash($password , PASSWORD_BCRYPT);

            $this->db->query($sql , array($first_name , $last_name , $contact_number , $password));
        }

        public function set_failed_login($contact_number){
            $sql = "UPDATE users SET last_failed_login = current_timestamp WHERE contact_number = ?";

            $this->db->query($sql , array($contact_number));
        }

        public function get_user($contact_number){
            $sql = "SELECT * FROM users WHERE contact_number = ?";

            return $this->db->query($sql , array($contact_number))->row_array();
        }
    }
?>
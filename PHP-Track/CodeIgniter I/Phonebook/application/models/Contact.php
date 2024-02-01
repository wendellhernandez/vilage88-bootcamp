<?php
    class Contact extends CI_Model{
        public function add_contact($name , $contact_number){
            $sql = "INSERT INTO contacts(name , contact_number) VALUES(? , ?)";
            $this->db->query($sql , array($name , $contact_number));
        }

        public function get_contacts(){
            $sql = "SELECT * FROM contacts";

            return $this->db->query($sql)->result_array();
        }

        public function get_contact_by_id($id){
            $sql = "SELECT * FROM contacts WHERE id = ?";
            
            return $this->db->query($sql , array($id))->row_array();
        }

        public function delete_contact($id){
            $sql = "DELETE FROM contacts WHERE id = ?";
            
            $this->db->query($sql , array($id));
        }

        public function update_contact($name , $contact_number, $id){
            $sql = "UPDATE contacts SET name = ? , contact_number = ? WHERE id = ?";
            $this->db->query($sql , array($name , $contact_number , $id));
        }
    }
?>
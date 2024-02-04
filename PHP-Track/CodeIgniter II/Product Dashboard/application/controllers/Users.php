<?php
    class Users extends CI_Controller{
        public function login(){
            $this->load->view("users/login");
        }
    }
?>
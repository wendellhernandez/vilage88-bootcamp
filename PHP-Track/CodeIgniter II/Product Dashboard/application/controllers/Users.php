<?php
    class Users extends CI_Controller{
        /*
        DOCU: This function is triggered by the default route or /login route.
        This loads the users/login view.
        The header partial takes the $data header_title variable to change the header title.

        Owner: Wendell
        */
        public function login(){
            $data = array("header_title" => "Login");

            $this->load->view("partials/login_register_header" , $data);
            $this->load->view("users/login");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /register route.
        This loads the users/register view.
        The header partial takes the $data header_title variable to change the header title.

        Owner: Wendell
        */
        public function register(){
            $data = array("header_title" => "Register");

            $this->load->view("partials/login_register_header" , $data);
            $this->load->view("users/register");
            $this->load->view("partials/footer");
        }
    }
?>
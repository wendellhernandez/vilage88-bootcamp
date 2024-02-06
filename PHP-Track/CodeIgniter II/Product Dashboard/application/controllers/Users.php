<?php
    class Users extends CI_Controller{
        /*
        DOCU: Load user model

        Owner: Wendell
        */
        public function __construct(){
            parent::__construct();
            $this->load->model("user");
        }

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
        Sets header_title variable for partials/login_register_header.

        Owner: Wendell
        */
        public function register(){
            $data = array(
                "header_title" => "Register",
                "validation_errors" => $this->session->flashdata("validation_errors")
            );

            $this->load->view("partials/login_register_header" , $data);
            $this->load->view("users/register");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /users/add_user route.
        This call the validate_registration() function to validate inputs.
        Makes a session for validation errors or success.
        Add users to database if success then return to /register route.

        Owner: Wendell
        */
        public function add_user(){
            $this->user->validate_registration();

            redirect("/register");
        }

        /*
        DOCU: This function is triggered by the /users/profile route.
        This loads the users/profile view which contains all user info.

        Owner: Wendell
        */
        public function profile(){
            $this->load->view("partials/header");
            $this->load->view("users/profile");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /users/edit route.
        This loads the users/edit view which users can edit their info.

        Owner: Wendell
        */
        public function edit(){
            $this->load->view("partials/header");
            $this->load->view("users/edit");
            $this->load->view("partials/footer");
        }
    }
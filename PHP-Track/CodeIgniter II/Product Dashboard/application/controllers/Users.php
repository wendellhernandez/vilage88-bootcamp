<?php
    class Users extends CI_Controller{
        /*
        DOCU: This function is triggered by the default route or /login route.
        This loads the users/login view.
        The header partial takes the $data header_title variable to change the header title.

        Owner: Wendell
        */
        public function login(){
            $this->user_logged_in();

            $data = array(
                "header_title" => "Login",
                "validation_errors" => $this->session->flashdata("validation_errors")
            );

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
            $this->user_logged_in();

            $data = array(
                "header_title" => "Register",
                "validation_errors" => $this->session->flashdata("validation_errors")
            );

            $this->load->view("partials/login_register_header" , $data);
            $this->load->view("users/register");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /users/logout route.
        

        Owner: Wendell
        */
        public function logout(){
            $this->session->sess_destroy();

            redirect("/");
        }

        /*
        DOCU: This function is triggered by the /users/add_user route.
        This call the validate_registration() function to validate inputs.

        Owner: Wendell
        */
        public function add_user(){
            $this->user->validate_registration();
        }

        /*
        DOCU: This function is triggered by the /users/login_user route.
        This call the validate_login() function to validate inputs.

        Owner: Wendell
        */
        public function login_user(){
            $this->user->validate_login();
        }

        /*
        DOCU: This function is triggered by the /users/profile route.
        This loads the users/profile view which contains all user info.

        Owner: Wendell
        */
        public function profile(){
            $this->user_login_check();

            $data = array(
                "user" => $this->user->get_user_by_id($this->session->userdata("user_id"))
            );

            $this->load->view("partials/header" , $data);
            $this->load->view("users/profile");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /users/edit route.
        This loads the users/edit view which users can edit their info.

        Owner: Wendell
        */
        public function edit(){
            $this->user_login_check();

            $data = array(
                "user" => $this->user->get_user_by_id($this->session->userdata("user_id")),
                "validation_errors" => $this->session->flashdata("validation_errors"),
                "password_errors" => $this->session->flashdata("password_errors")
            );

            $this->load->view("partials/header" , $data);
            $this->load->view("users/edit");
            $this->load->view("partials/footer");
        }

        /*
        DOCU: This function is triggered by the /users/edit_profile_info route.
        Uses the validate_user_edit() function to validate user inputs and edit the database

        Owner: Wendell
        */
        public function edit_profile_info(){
            $this->user_login_check();

            $this->user->validate_user_edit();
        }

        /*
        DOCU: This function is triggered by the /users/edit_password route.
        Uses the validate_password() function to validate user inputs and edit the database

        Owner: Wendell
        */
        public function edit_password(){
            $this->user_login_check();

            $this->user->validate_password();
            $this->logout();
        }

        /*
        DOCU: Checks if user is logged in.
        redirect to /login if not logged in.

        Owner: Wendell
        */
        public function user_login_check(){
            if(empty($this->session->userdata("user_id"))){
                redirect("/");
            }
        }

        /*
        DOCU: Checks if user is logged in.
        redirect to /dashboard/admin if already logged in.

        Owner: Wendell
        */
        public function user_logged_in(){
            if(!empty($this->session->userdata("user_id"))){
                redirect("/dashboard/admin");
            }
        }
    }
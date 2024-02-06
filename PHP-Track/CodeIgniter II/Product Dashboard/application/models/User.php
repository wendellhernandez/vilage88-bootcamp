<?php
    class User extends CI_Model{
        /*
        DOCU: Validates user inputs.
        Makes a session for validation errors or success.
        Add users to database if success then return to /register route.

        Owner: Wendell
        */
        public function validate_registration(){
            $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|is_unique[users.email_address]|valid_email');
            
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');

            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|matches[confirm_password]');

            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

            if(!$this->form_validation->run()){
                $validation_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("validation_errors" , $validation_errors);
            }else{
                $this->register_user();

                $this->session->set_flashdata("validation_errors" , "<div class='register_success'>Registration Successful</div>");
            }

            redirect("/register");
        }

        /*
        DOCU: Validates user inputs.
        Makes a session for validation errors and transfer to /login route if there are errors.
        If verified, creates a user_id session then transfer to /dashboard/admin route.

        Owner: Wendell
        */
        public function validate_login(){
            $email_address = $this->input->post("email_address" , TRUE);
            $user_id = $this->get_userid_by_email($email_address);
            $user = $this->get_user_by_id($user_id);

            $this->form_validation->set_rules("email_address", "Email Address", "trim|required|valid_email");
            
            $this->form_validation->set_rules("password", "Password", "trim|required");

            if(!$this->form_validation->run()){
                $validation_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("validation_errors" , $validation_errors);

                redirect("/login");
            }else if(empty($this->get_userid_by_email($email_address))){
                $this->session->set_flashdata("validation_errors" , "<div class='validation_errors'>Invalid Credentials</div>");

                redirect("/login");
            }else if($user["password"] != md5($this->input->post("password" , TRUE))){
                $this->session->set_flashdata("validation_errors" , "<div class='validation_errors'>Invalid Credentials</div>");

                redirect("/login");
            }else{
                $this->session->set_userdata("user_id" , $user_id);
            
                redirect("/dashboard/admin");
            }
        }

        /*
        DOCU: This function enters the user into the users table.
        It encrypts the password using md5.

        Owner: Wendell
        */
        public function register_user(){
            $email_address = $this->input->post("email_address" , TRUE);
            $first_name = $this->input->post("first_name" , TRUE);
            $last_name = $this->input->post("last_name" , TRUE);
            $password = $this->input->post("password" , TRUE);
            $password_hash = md5($password);

            $query = "INSERT INTO users (email_address , first_name , last_name , password) VALUES (? , ? , ? , ?) ;";

            $this->db->query($query , array($email_address , $first_name , $last_name , $password_hash));

            $users = $this->get_all_users();

            if(count($users) == 1){
                $query = "UPDATE users SET user_level = 9";

                $this->db->query($query);
            }
        }

        /*
        DOCU: This function gets all users from the database

        Owner: Wendell
        */
        public function get_all_users(){
            $query = "SELECT * FROM users;";

            return $this->db->query($query)->result_array();
        }

        /*
        DOCU: This function gets the id of a user by email

        Owner: Wendell
        */
        public function get_userid_by_email($email_address){
            $query = "SELECT id FROM users WHERE email_address = ?;";

            $result = $this->db->query($query , array($email_address))->row_array();

            return $result["id"];
        }

        /*
        DOCU: This function gets all user info by id

        Owner: Wendell
        */
        public function get_user_by_id($id){
            $query = "SELECT * FROM users WHERE id = ?;";

            return $result = $this->db->query($query , $id)->row_array();
        }

        /*
        DOCU: Validates user inputs.
        Sets session validation_errors if there is invalid input.
        Calls edit_user() function if input is valid then redirects to /users/profile route.

        Owner: Wendell
        */
        public function validate_user_edit(){
            $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
            
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');

            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

            if(!$this->form_validation->run()){
                $validation_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("validation_errors" , $validation_errors);

                redirect("/users/edit/");
            }else{
                $this->edit_user();

                redirect("/users/profile");
            }
        }

        /*
        DOCU: This function edits user info

        Owner: Wendell
        */
        public function edit_user(){
            $email_address = $this->input->post("email_address" , TRUE);
            $first_name = $this->input->post("first_name" , TRUE);
            $last_name = $this->input->post("last_name" , TRUE);
            $user_id = $this->session->userdata("user_id");

            $query = "UPDATE users SET email_address = ? , first_name = ? , last_name = ? WHERE id = ?";

            $this->db->query($query , array($email_address , $first_name , $last_name , $user_id));
        }

        /*
        DOCU: Validates user inputs.
        Sets session validation_errors if there is invalid input.
        Calls edit_password() function if input is valid then redirects to /users/profile route.

        Owner: Wendell
        */
        public function validate_password(){
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
            
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');

            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

            $old_password = $this->input->post("old_password" , TRUE);
            $new_password = $this->input->post("new_password" , TRUE);
            $confirm_password = $this->input->post("confirm_password" , TRUE);
            $user_id = $this->session->userdata("user_id");
            $user = $this->get_user_by_id($user_id);

            if(!$this->form_validation->run()){
                $password_errors =  validation_errors("<div class='validation_errors'>" , "</div>");

                $this->session->set_flashdata("password_errors" , $password_errors);

                redirect("/users/edit/");
            }else if($user["password"] != md5($old_password)){
                $this->session->set_flashdata("password_errors" , "<div class='validation_errors'>Invalid Credential</div>");

                redirect("/users/edit/");
            }else if($new_password != $confirm_password){
                $this->session->set_flashdata("password_errors" , "<div class='validation_errors'>Password does not match</div>");

                redirect("/users/edit/");
            }else{
                $this->update_user_password($new_password , $user_id);
            }
        }

        /*
        DOCU: This function edits user password

        Owner: Wendell
        */
        public function update_user_password($new_password , $user_id){
            $pass_hash = md5($new_password);

            $query = "UPDATE users SET password = ? WHERE id = ?";

            $this->db->query($query , array($pass_hash , $user_id));
        }
    }
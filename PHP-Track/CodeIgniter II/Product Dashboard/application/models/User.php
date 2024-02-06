<?php
    class User extends CI_Model{
        /*
        DOCU: This function is triggered by the /register route.
        This loads the users/register view.
        Sets header_title variable for partials/login_register_header.

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
                $this->session->set_flashdata("validation_errors" , "<div class='register_success'>Registration Successful</div>");
            }
        }

        public function register_user(){
            $email_address = $this->input->post('email_address' , TRUE);
            $first_name = $this->input->post('first_name' , TRUE);
            $last_name = $this->input->post('last_name' , TRUE);
            $password = $this->input->post('password' , TRUE);

            $query = "INSERT INTO users (email_address , first_name , last_name , password) VALUES ('$email_address' , '$first_name' , '$last_name' , '$password');";
        }
    }
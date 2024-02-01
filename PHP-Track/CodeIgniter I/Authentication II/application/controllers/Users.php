<?php
    class Users extends CI_Controller{
        public function index(){
            if(empty($this->session->userdata("logged_in"))){
                $this->session->set_userdata("logged_in" , FALSE);
            }

            if(!$this->session->userdata("logged_in")){
                if(!empty($this->session->flashdata("userdata"))){
                    $data = $this->session->flashdata("userdata");

                    $this->load->view("users/index.php" , $data);
                }else{
                    $this->load->view("users/index.php");
                }
            }else{
                redirect("/users/profile");
            }
        }

        public function profile(){
            if($this->session->userdata("logged_in")){
                if(!empty($this->session->userdata("userdata"))){
                    $data = $this->session->userdata("userdata");
    
                    $this->load->view("users/profile.php" , $data);
                }else{
                    redirect("/");
                }
            }else{
                redirect("/");
            }
        }

        public function create(){
            $this->form_validation->set_rules("first_name" , "First Name" , "trim|required");
            $this->form_validation->set_rules("last_name" , "Last Name" , "trim|required");
            $this->form_validation->set_rules("contact_number" , "Contact Number" , "trim|required|numeric|is_unique[users.contact_number]|exact_length[11]");
            $this->form_validation->set_rules("password" , "Password" , "trim|required|matches[repeat_password]|min_length[8]");
            $this->form_validation->set_rules("repeat_password" , "Repeat Password" , "trim|required");

            $first_name = $this->input->post("first_name" , TRUE);
            $last_name = $this->input->post("last_name" , TRUE);
            $contact_number = $this->input->post("contact_number" , TRUE);
            $password = $this->input->post("password" , TRUE);
            $repeat_password = $this->input->post("repeat_password" , TRUE);

            $userdata = array(
                "first_name" => $first_name,
                "last_name" => $last_name,
                "contact_number" => $contact_number,
                "password" => $password,
                "repeat_password" => $repeat_password
            );

            if(!$this->form_validation->run()){
                $userdata["errors"] = validation_errors("<p class='error'>" , "</p>");

                $this->session->set_flashdata("userdata" , $userdata);

                redirect("/");
            }

            $this->load->model("User");
            $this->User->set_user($first_name , $last_name , $contact_number , $password);

            $this->session->set_userdata("userdata" , $userdata);
            $this->session->set_userdata("logged_in" , TRUE);

            redirect("/users/profile");
        }

        public function login(){
            $this->form_validation->set_rules("contact_number" , "Contact Number" , "trim|required|numeric|exact_length[11]");
            $this->form_validation->set_rules("password" , "Password" , "trim|required");

            $contact_number = $contact_number = $this->input->post("contact_number" , TRUE);
            $password = $this->input->post("password" , TRUE);

            if(!$this->form_validation->run()){
                $userdata = array(
                    "contact_number" => $contact_number,
                    "login_errors" => validation_errors("<p class='error'>" , "</p>")
                );

                $this->session->set_flashdata("userdata" , $userdata);

                redirect("/");
            }

            $this->load->model("User");
            $userdata = $this->User->get_user($contact_number);

            if(!empty($userdata)){
                if(password_verify($password , $userdata["password"])){
                    $this->session->set_userdata("userdata" , $userdata);
                    $this->session->set_userdata("logged_in" , TRUE);

                    redirect("/users/profile");
                }else{
                    $userdata = array(
                        "login_errors" => "<p class='error'>Password not match</p>"
                    );
    
                    $this->session->set_flashdata("userdata" , $userdata);

                    $this->User->set_failed_login($contact_number);
    
                    redirect("/");
                }
            }else{
                $userdata = array(
                    "login_errors" => "<p class='error'>Number is not registered</p>"
                );

                $this->session->set_flashdata("userdata" , $userdata);

                redirect("/");
            }
        }

        public function logout(){
            $this->session->set_userdata("logged_in" , FALSE);

            redirect("/");
        }
    }
?>
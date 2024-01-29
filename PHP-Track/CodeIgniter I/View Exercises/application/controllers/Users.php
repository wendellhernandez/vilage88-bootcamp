<?php
    class Users extends CI_Controller{
        public function index(){
            $this->load->view("users/index");
        }

        public function new(){
            $this->load->view("users/new");
        }

        public function create(){
            if(!empty($this->input->post('add_user'))){
                echo "This feature is coming soon!";
            }else{
                redirect("/users");
            }
        }

        public function count(){
            if(empty($this->session->userdata("count"))){
                $this->session->set_userdata("count" , 0);
            }

            $visits = $this->session->userdata("count") + 1;

            $this->session->set_userdata("count" , $visits);

            echo "You have visited this page: " . $this->session->userdata("count") . " times";
        }

        public function reset(){
            $this->session->set_userdata("count" , 0);

            $this->load->view("users/reset");
        }

        public function say($message, $number = 1){
            $data = array(
                "message" => $message,
                "number" => $number
            );

            $this->load->view("users/say" , $data);
        }

        public function mprep(){
            $view_data = array(
                'name' => "Michael Choi",
                'age'  => 40,
                'location' => "Seattle, WA",
                'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
            );
            
            $this->load->view('users/mprep', $view_data);
        }
    }
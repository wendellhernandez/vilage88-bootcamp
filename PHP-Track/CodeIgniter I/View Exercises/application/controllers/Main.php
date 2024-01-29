<?php
    class Main extends CI_Controller {
        public function index(){
            echo "I am Main Class!";
        }

        public function hello(){
            echo "Hello World!";
        }

        public function say(){
            echo "HI";
        }

        public function say_anything($message){
            echo strtoupper($message);
        }

        public function danger(){
            redirect("/main");
        }

        public function world(){
            $this->load->view("main/world");
        }

        public function ninjas($count = 5){
            $data = array("count" => $count);

            $this->load->view("main/ninjas" , $data);
        }
    }
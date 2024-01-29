<?php
    class Main extends CI_Controller {
        public function index()
        {
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
    }
<?php
    class Feedback extends CI_Controller{
        public function index(){
            $this->load->view("feedback/index");
        }

        public function result(){
            $this->load->view("feedback/result");
        }
    }
?>
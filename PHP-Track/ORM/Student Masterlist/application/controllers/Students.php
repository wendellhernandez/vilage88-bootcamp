<?php
    class Students extends CI_Controller{
        public function index(){
            $students = new Student();
            $students->get();

            $data = array(
                "students" => $students
            );

            $this->load->view("students/index" , $data);
        }

        public function enroll(){
            
        }
    }
<?php
    class Students extends CI_Controller{
        public function index(){
            $students = new Student();
            $students->get();

            $data = array(
                "students" => $students,
                "table_row" => 0,
                "delete_row" => 0,
                "last_name_error" => $this->session->flashdata("last_name_error"),
                "first_name_error" => $this->session->flashdata("first_name_error"),
                "gender_error" => $this->session->flashdata("gender_error")
            );

            $this->load->view("students/index" , $data);
        }

        public function enroll(){
            $students = new Student();
            $students->last_name = $this->input->post("last_name" , TRUE);
            $students->first_name = $this->input->post("first_name" , TRUE);
            $students->gender = $this->input->post("gender" , TRUE);
            $students->save();

            $this->session->set_flashdata("last_name_error" , $students->error->last_name);
            $this->session->set_flashdata("first_name_error" , $students->error->first_name);
            $this->session->set_flashdata("gender_error" , $students->error->gender);

            redirect("/");
        }

        public function terminate($student_id){
            $students = new Student();
            $students->get(1,$student_id);
            $students->delete();

            redirect("/");
        }
    }
<?php
    class Students extends CI_Controller{
        public function index(){
            $courses = new Course();
            $courses->get();
            $students = new Student();
            $students->include_related("course")->get();

            $data = array(
                "students" => $students,
                "courses" => $courses,
                "course_row" => 0,
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
            $students->course_id = $this->input->post("course_id" , TRUE);
            $students->save();

            $this->session->set_flashdata("last_name_error" , $students->error->last_name);
            $this->session->set_flashdata("first_name_error" , $students->error->first_name);
            $this->session->set_flashdata("gender_error" , $students->error->gender);

            redirect("/");
        }

        public function terminate($delete_row){
            $students = new Student();
            $students->get(1,$delete_row);
            $students->delete();

            redirect("/");
        }

        public function update($table_row){
            $courses = new Course();
            $courses->get();
            $students = new Student();
            $students->include_related("course")->get(1,$table_row-1);
            $students->last_name = $this->input->post("last_name" , TRUE);
            $students->first_name = $this->input->post("first_name" , TRUE);
            $students->gender = $this->input->post("gender" , TRUE);
            $students->course_id = $this->input->post("course_id" , TRUE);
            $students->save();

            $this->session->set_flashdata("last_name_error" , $students->error->last_name);
            $this->session->set_flashdata("first_name_error" , $students->error->first_name);

            if(!empty($students->error->last_name) || !empty($students->error->first_name)){
                redirect("/students/edit/$table_row");
            }

            redirect("/");
        }

        public function edit($table_row){
            $courses = new Course();
            $courses->get();
            $students = new Student();
            $students->include_related("course")->get(1,$table_row-1);

            $data = array(
                "students" => $students,
                "courses" => $courses,
                "delete_row" => $table_row - 1,
                "course_row" => 0,
                "table_row" => $table_row,
                "last_name_error" => $this->session->flashdata("last_name_error"),
                "first_name_error" => $this->session->flashdata("first_name_error"),
                "gender_error" => $this->session->flashdata("gender_error")
            );

            $this->load->view("students/edit" , $data);
        }
    }
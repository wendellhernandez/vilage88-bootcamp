<?php
    class Contacts extends CI_Controller{
        public function index(){
            $this->load->model("Contact");

            $data = array(
                "contacts" => $this->Contact->get_contacts()
            );

            $this->load->view("contacts/index" , $data);
        }

        public function new(){
            if(!empty($this->session->flashdata("errors"))){
                $data = array(
                    "errors" => $this->session->flashdata("errors"),
                    "name" => $this->session->flashdata("name"),
                    "contact_number" => $this->session->flashdata("contact_number")
                );

                $this->load->view("contacts/new" , $data);
            }else{
                $this->load->view("contacts/new");
            }
        }

        public function create(){
            $this->form_validation->set_rules("name" , "Name" , "trim|required|min_length[2]|alpha_numeric_spaces");
            $this->form_validation->set_rules("contact_number" , "Contact Number" , "trim|required|numeric|exact_length[11]|is_unique[contacts.contact_number]");

            if(!$this->form_validation->run()){
                $this->session->set_flashdata("errors" , validation_errors("<div>" , "</div>"));
                $this->session->set_flashdata("name" , set_value("name"));
                $this->session->set_flashdata("contact_number" , set_value("contact_number"));

                redirect("/contacts/new");
            }

            $name = $this->input->post("name" , TRUE);
            $contact_number = $this->input->post("contact_number" , TRUE);

            $this->load->model("Contact");
            $this->Contact->add_contact($name , $contact_number);

            redirect("/contacts");
        }

        public function destroy($id){
            $this->load->model("Contact");
            $this->Contact->delete_contact($id);
            
            redirect("/contacts");
        }

        public function show($id){
            $this->load->model("Contact");
            
            $data = array(
                "contact" => $this->Contact->get_contact_by_id($id)
            );

            $this->load->view("contacts/show" , $data);
        }

        public function edit($id){
            $this->load->model("Contact");

            if(!empty($this->session->flashdata("errors"))){
                $data = array(
                    "errors" => $this->session->flashdata("errors"),
                    "name" => $this->session->flashdata("name"),
                    "contact_number" => $this->session->flashdata("contact_number"),
                    "contact" => $this->Contact->get_contact_by_id($id)
                );

                $this->load->view("contacts/edit" , $data);
            }else{
                $data = array(
                    "contact" => $this->Contact->get_contact_by_id($id)
                );
    
                $this->load->view("contacts/edit" , $data);
            }
        }

        public function update($id){
            $this->form_validation->set_rules("name" , "Name" , "trim|required|min_length[2]|alpha_numeric_spaces");
            $this->form_validation->set_rules("contact_number" , "Contact Number" , "trim|required|numeric|exact_length[11]|is_unique[contacts.contact_number]");

            if(!$this->form_validation->run()){
                $this->session->set_flashdata("errors" , validation_errors("<div>" , "</div>"));
                $this->session->set_flashdata("name" , set_value("name"));
                $this->session->set_flashdata("contact_number" , set_value("contact_number"));

                redirect("/contacts/edit/$id");
            }

            $name = $this->input->post("name" , TRUE);
            $contact_number = $this->input->post("contact_number" , TRUE);

            $this->load->model("Contact");
            $this->Contact->update_contact($name , $contact_number , $id);

            redirect("/contacts");
        }
    }
?>
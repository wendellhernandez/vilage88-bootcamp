<?php
    class Bookmarks extends CI_Controller{
        public function index(){
            if(!empty($this->session->flashdata("errors"))){
                $data = array(
                    "errors" => $this->session->flashdata("errors"),
                    "name" => $this->session->flashdata("name"),
                    "url" => $this->session->flashdata("url")
                );

                $this->load->view("bookmarks/index.php" , $data);
            }else{
                $this->load->view("bookmarks/index.php");
            }
        }

        public function add(){
            $this->form_validation->set_rules("name" , "Name" , "trim|required|min_length[2]|alpha_numeric");
            $this->form_validation->set_rules("url" , "URL" , "trim|required|valid_url");
            $this->form_validation->set_rules("folder" , "Folder" , "required");

            if(!$this->form_validation->run()){
                $this->session->set_flashdata("errors" , validation_errors("<div>" , "</div>"));
                $this->session->set_flashdata("name" , set_value("name"));
                $this->session->set_flashdata("url" , set_value("url"));

                redirect("/");
            }

            $name = $this->input->post("name" , TRUE);
            $url = $this->input->post("url" , TRUE);
            $folder = $this->input->post("folder" , TRUE);

            $this->load->model("Bookmark");
            $this->Bookmark->add_bookmark($name , $url , $folder);

            redirect("/bookmarks/show");
        }

        public function show(){
            $this->load->model("Bookmark");

            $data = array(
                "bookmarks" => $this->Bookmark->get_bookmarks()
            );

            $this->load->view("bookmarks/show" , $data);
        }

        public function destroy($id){
            $this->load->model("Bookmark");
            
            $data = array(
                "bookmark" => $this->Bookmark->get_bookmark_by_id($id)
            );

            $this->load->view("bookmarks/destroy" , $data);
        }

        public function delete_bookmarks($id){
            $this->load->model("Bookmark");
            $this->Bookmark->delete_bookmark($id);

            redirect("/bookmarks/show");
        }
    }
?>
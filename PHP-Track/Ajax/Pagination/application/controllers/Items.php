<?php
    class Items extends CI_Controller{
        public function index(){
            $this->load->view("items/index");
        }

        public function filter(){
            $data = array(
                "items" => $this->item->get_filtered_items(),
                "row" => 0,
                "hidden" => array(
                    "name" => $this->input->post("name" , TRUE) ,
                    "min" => $this->input->post("min" , TRUE) ,
                    "max" => $this->input->post("max" , TRUE) ,
                    "order" => $this->input->post("order" , TRUE) 
                )
            );

            if(empty($this->input->post("page" , TRUE))){
                $data["page"] = 1;
            }else{
                $data["page"] = $this->input->post("page" , TRUE);
            }

            $this->load->view("partials/items_api" , $data);
        }
    }
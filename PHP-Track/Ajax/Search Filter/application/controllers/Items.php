<?php
    class Items extends CI_Controller{
        public function index(){
            $this->load->view("items/index");
        }

        public function filter(){
            $data["items"] = $this->item->get_filtered_items();
            $data["row"] = 0;

            $this->load->view("partials/items_api" , $data);
        }
    }
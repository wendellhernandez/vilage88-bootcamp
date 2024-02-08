<?php
    class Orders extends CI_Controller{
        public function index(){
            $data["orders"] = $this->order->get_orders();

            $this->load->view("orders/orders" , $data);
        }

        public function create(){
            $orders = $this->input->post(NULL , TRUE);

            $this->order->set_order($orders);

            redirect("/");
        }
    }
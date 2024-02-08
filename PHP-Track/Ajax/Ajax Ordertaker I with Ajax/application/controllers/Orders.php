<?php
    class Orders extends CI_Controller{
        public function index(){
            $this->load->view("orders/orders");
        }

        public function create(){
            $orders = $this->input->post(NULL , TRUE);
            $this->order->set_order($orders);

            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }

        public function orders_api(){
            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }
    }
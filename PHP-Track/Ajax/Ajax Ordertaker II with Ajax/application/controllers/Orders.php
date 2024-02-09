<?php
    class Orders extends CI_Controller{
        public function index(){
            $this->load->view("orders/orders");
        }

        public function create(){
            if(!empty($order = $this->input->post("order" , TRUE))){
                $order = $this->input->post("order" , TRUE);
                $this->order->set_order($order);
            }

            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }

        public function update($order_id){
            if(!empty($order = $this->input->post("order" , TRUE))){
                $order = $this->input->post("order" , TRUE);
                $this->order->update_order($order , $order_id);
            }

            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }

        public function delete($order_id){
            $this->order->delete_order($order_id);

            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }

        public function orders_api(){
            $data["orders"] = $this->order->get_orders();
            $this->load->view("partials/orders_api" , $data);
        }
    }
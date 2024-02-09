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

        public function update($order_id){
            $orders = $this->input->post(NULL , TRUE);
            $orders["order_id"] = $order_id;

            $this->order->update_order($orders);

            redirect("/");
        }

        public function delete($order_id){
            $this->order->delete_order($order_id);

            redirect("/");
        }
    }
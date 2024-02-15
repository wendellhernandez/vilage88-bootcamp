<?php
    class Carts extends CI_Controller{
        public function index(){
            $cart_products = $this->Cart->get_cart_products();
            $total = 0;

            foreach($cart_products as $cart_product){
                $total += $cart_product["quantity"] * $cart_product["price"];
            }

            $data = array(
                "cart_products" => $cart_products,
                "total" => $total
            );

            $this->load->view("carts/index" , $data);
        }

        public function add($id){
            if(!$this->input->post("quantity" , TRUE)){
                redirect("/");
            }

            $quantity = $this->input->post("quantity" , TRUE);

            $this->Cart->add_to_cart($id , $quantity);

            redirect("/");
        }

        public function remove($id){
            if(!$this->input->post("remove" , TRUE)){
                redirect("/carts");
            }

            $this->Cart->remove_from_cart($id);

            redirect("/carts");
        }
    }
?>
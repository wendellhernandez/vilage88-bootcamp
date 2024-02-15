<?php
    class Products extends CI_Controller{
        public function index(){
            $products = $this->Product->get_products();
            $cart_products = $this->Cart->get_cart_products();

            $data = array(
                "products" => $products,
                "cart_products" => $cart_products
            );

            $this->load->view("products/index" , $data);
        }
    }
?>
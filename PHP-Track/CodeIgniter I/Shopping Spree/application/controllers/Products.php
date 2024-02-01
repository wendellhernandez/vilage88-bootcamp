<?php
    class Products extends CI_Controller{
        public function index(){
            $this->load->model("Product");
            $products = $this->Product->get_products();
            $cart_products = $this->Product->get_cart_products();

            $data = array(
                "products" => $products,
                "cart_products" => $cart_products
            );

            $this->load->view("products/index" , $data);
        }

        public function cart(){
            $this->load->model("Product");
            $cart_products = $this->Product->get_cart_products();
            $total = 0;

            foreach($cart_products as $cart_product){
                $total += $cart_product["quantity"] * $cart_product["price"];
            }

            $data = array(
                "cart_products" => $cart_products,
                "total" => $total
            );

            $this->load->view("products/cart" , $data);
        }

        public function add($id){
            $quantity = $this->input->post("quantity" , TRUE);

            $this->load->model("Product");
            $this->Product->add_to_cart($id , $quantity);

            redirect("/");
        }

        public function remove($id){
            $this->load->model("Product");
            $this->Product->remove_from_cart($id);

            redirect("/products/cart");
        }
    }
?>
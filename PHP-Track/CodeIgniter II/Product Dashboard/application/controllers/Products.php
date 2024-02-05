<?php
    class Products extends CI_Controller{
        /*
        DOCU: This function is triggered by the /dashboard/admin route.
        This loads the products/dashboard_admin view.

        Owner: Wendell
        */
        public function dashboard_admin(){
            $this->load->view("partials/header");
            $this->load->view("products/dashboard_admin");
            $this->load->view("partials/footer");
        }
    }
?>
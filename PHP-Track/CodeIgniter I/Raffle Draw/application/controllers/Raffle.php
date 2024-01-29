<?php
    class Raffle extends CI_Controller{
        public function index(){
            if(empty($this->session->userdata("count"))){
                $this->session->set_userdata("count" , 0);
            }

            $data = array(
                "count" => $this->session->userdata("count"),
                "random" => rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)
            );

            $this->load->view("raffle/index" , $data);
        }

        public function pick(){
            $add_winner = $this->session->userdata("count") + 1;

            $this->session->set_userdata("count" , $add_winner);

            redirect("/");
        }
    }
?>
<?php
    class Players extends CI_Controller{
        /* Gets all sports from database and puts in the $data variable.
        Gets all players from database and puts in the $data variable.
        Loads the players/index view with the $data variable*/
        public function index(){
            $data = array(
                "sports" => $this->Sport->get_sports(),
                "players" => $this->Player->get_players()
            );

            $this->load->view("players/index" , $data);
        }
    }
?>
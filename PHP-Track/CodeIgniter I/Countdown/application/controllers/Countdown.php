<?php
    class Countdown extends CI_Controller{
        public function main(){
            date_default_timezone_set('Asia/Manila');

            $date = date("M d, Y");
            $remaing_seconds = 24*60*60 - date('H') * 3600 - date('i') * 60 - date('s');

            $data = array(
                "date" => $date,
                "remaining_seconds" => $remaing_seconds
            );

            $this->load->view("countdown/main" , $data);
        }
    }
?>
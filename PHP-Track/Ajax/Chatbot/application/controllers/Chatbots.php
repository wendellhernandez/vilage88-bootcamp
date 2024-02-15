<?php
    class Chatbots extends CI_Controller{
        public function index(){
            $this->load->view('chatbots/index');
        }

        public function chat()
        {
            $utext = $this->input->post('user_input');

            $url = 'https://wsapi.simsimi.com/190410/talk';
    
            $header = array(
                'Content-Type: application/json',
                'x-api-key: 1ZracURR8gqVYu-oxkcMl8BU4s-vVMMWoX~qQ7ny'
            );
    
            $data = array(
                'utext' => $utext,
                'lang' => 'en'
            );
    
            $json_data = json_encode($data);
    
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER	=> 1,
                CURLOPT_URL				=> $url,
                CURLOPT_POST			=> $json_data,
                CURLOPT_HTTPHEADER		=> $header,
                CURLOPT_POSTFIELDS		=> $json_data,
                CURLOPT_CONNECTTIMEOUT	=> 30,
                CURLOPT_FOLLOWLOCATION	=> 1,
                CURLOPT_SSL_VERIFYPEER	=> 0,
                CURLOPT_SSL_VERIFYHOST	=> 0
            ));
    
            ;
            if(!$results = curl_exec($curl)){
                echo curl_error($curl);
            }
    
            curl_close($curl);
    
            print_r($results);
        }
    }
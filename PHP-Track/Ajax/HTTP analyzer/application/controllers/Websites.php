<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Websites extends CI_Controller {
        public function index(){
            $this->load->view('websites/index');
        }

        public function get_page(){
            require('application/libraries/simple_form_dom.php');

            $this->form_validation->set_rules("url" , "URL" , "trim|required");

            if($this->form_validation->run()){
                $url = $this->input->post("url" ,TRUE);
                $html = file_get_html($url);
    
                $data = array(
                    "meta" => count($html->find('meta')),
                    "div" => count($html->find('div')),
                    "p" => count($html->find('p')),
                    "a" => count($html->find('a')),
                    "img" => count($html->find('img')),
                    "ul" => count($html->find('ul')),
                    "li" => count($html->find('li')),
                    "h1" => count($html->find('h1')),
                    "h2" => count($html->find('h2')),
                    "h3" => count($html->find('h3')),
                    "response" => htmlspecialchars($html),
                    "validation_errors" => ""
                );
            }else{
                $data["validation_errors"] = validation_errors();
            }

            $this->load->view("partials/analizer_api" , $data);
        }
    }
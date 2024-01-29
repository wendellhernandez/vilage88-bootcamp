<?php
    date_default_timezone_set('Asia/Manila');

    class Game extends CI_Controller{
        public function index(){
            if(empty($this->session->userdata('money'))){
                $this->session->set_userdata('money' , 500);
            }

            $this->load->view("game/index");
        }

        public function bet(){
            $reward = rand($this->input->post('reward' , TRUE)/3, $this->input->post('reward' , TRUE));
            $penalty = rand($this->input->post('penalty' , TRUE)/3, $this->input->post('penalty' , TRUE));
            $risk_type = $this->input->post('risk_type' , TRUE);
            $risk = $this->input->post('risk' , TRUE);

            if(rand(1,100) > $risk){
                $total_reward = $this->session->userdata('money') + $reward;
                $this->session->set_userdata('money' , $total_reward);
                $round_data['value'] = 'You gained ' . $reward;
                $round_data['status'] = 'win';
            }else{
                $total_penalty = $this->session->userdata('money') - $penalty;
                $this->session->set_userdata('money' , $total_penalty);
                $round_data['value'] = 'You lost ' . $penalty;
                $round_data['status'] = 'lose';
            }

            $round_data['risk_type'] = $risk_type;
            $round_data['date'] = date("m/d/Y h:i:sa");
            $round_data['money'] = $this->session->userdata('money');

            $round_datas = $this->session->userdata('game_data');
            $round_datas[] = $round_data;

            $this->session->set_userdata('game_data' , $round_datas);

            redirect("/");
        }

        public function reset(){
            $this->session->set_userdata('money' , 500);
            $this->session->unset_userdata('game_data');

            redirect("/");
        }
    }
?>
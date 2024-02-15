<?php
	class Leaves extends CI_Controller{
		public function requests($count = 5){
			$requests = $this->leave->get_requests();
			$this->session->set_userdata("count" , $count);

			$data = array(
				"requests" => $requests,
				"count" => $this->session->userdata("count")
			);

			$this->load->view("leaves/requests" , $data);
		}

		public function addcount(){
			$count = $this->session->userdata("count");
			$count += 5;

			$this->session->set_userdata("count" , $count);
			$new_count = $this->session->userdata("count");

			redirect("/requests/{$new_count}");
		}
	}
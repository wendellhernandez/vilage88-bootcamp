<?php
	class Leaves extends CI_Controller{
		public function requests(){
			$requests = $this->leave->get_requests();

			$data = array(
				"requests" => $requests
			);

			$this->load->view("leaves/requests" , $data);
		}
	}
<?php
	class Leaves extends CI_Controller{
		public function requests(){
			$this->load->view("leaves/requests");
		}

		public function table_partial(){
			$requests = $this->leave->get_requests();

			$data = array(
				"requests" => $requests
			);

			$this->load->view("partials/table_partial" , $data);
		}
	}
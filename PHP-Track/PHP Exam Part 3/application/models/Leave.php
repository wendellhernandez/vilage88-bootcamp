<?php
    class Leave extends CI_Model{
        public function get_requests(){
            $leave_type = $this->input->post('leave_type' , TRUE);
			$sort_by_request_date = $this->input->post('sort_by_request_date' , TRUE);
            $current_date = date('Y-m-d' , strtotime('today'));
            $oldest_request_date = $this->get_oldest_request_date();
            $start_date = $oldest_request_date;
            $end_date = $current_date;

			if(empty($sort_by_request_date)){
                $order_by = "employee_name";
			}else if($sort_by_request_date == 'most_recent'){
                $order_by = "request_date DESC";

                $start_date = date('Y-m-d' , strtotime('-6 days'));
                $end_date = $current_date;
            }else{
                $order_by = "request_date";

                $start_date = $oldest_request_date;
                $end_date = date('Y-m-d' , strtotime('-1 week'));;
            }

            $sql = 
                "SELECT 
                    employee_name,
                    date_format(request_date , '%m/%d/%Y') as request_date,
                    date_format(from_date , '%m/%d/%Y') as from_date,
                    date_format(to_date , '%m/%d/%Y') as to_date,
                    leave_type
                FROM leaves
                WHERE leave_type LIKE '$leave_type%' 
                AND request_date BETWEEN '$start_date' AND '$end_date'
                ORDER BY $order_by
                ";

            return $this->db->query($sql)->result_array();
        }

        public function get_oldest_request_date(){
            $sql = 
                "SELECT 
                    date_format(request_date , '%Y-%m-%d') as latest_request
                FROM leaves
                ORDER BY latest_request
                LIMIT 1
                ";

            $latest = $this->db->query($sql)->row_array();
            $latest_request = $latest['latest_request'];

            return $latest_request;
        }
    }
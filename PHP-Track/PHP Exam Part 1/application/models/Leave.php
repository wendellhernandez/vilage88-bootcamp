<?php
    class Leave extends CI_Model{
        public function get_requests(){
            $sql = 
                "SELECT 
                    employee_name,
                    date_format(request_date , '%m/%d/%Y') as request_date,
                    date_format(from_date , '%m/%d/%Y') as from_date,
                    date_format(to_date , '%m/%d/%Y') as to_date,
                    leave_type
                FROM leaves
                ORDER BY employee_name
                ";

            return $this->db->query($sql)->result_array();
        }
    }
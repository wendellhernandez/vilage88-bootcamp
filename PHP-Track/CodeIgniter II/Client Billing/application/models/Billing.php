<?php
    class Billing extends CI_Model{
        /* Loads the default view */
        public function get_billings($start_date=201101 , $end_date=201112){
            $sql = "SELECT date_format(charged_datetime , '%M') AS month , date_format(charged_datetime , '%Y') AS year , sum(amount) AS total_cost
                FROM billing
                WHERE date_format(charged_datetime , '%Y%m') BETWEEN $start_date AND $end_date
                GROUP BY month , year
                ORDER BY date_format(charged_datetime , '%Y') , date_format(charged_datetime , '%m');";

            return $this->db->query($sql)->result_array();
        }
    }
?>
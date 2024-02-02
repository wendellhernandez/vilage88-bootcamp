<?php
    class Billings extends CI_Controller{
        /* This takes the start and end dates from billings/index view and checks if the dates are valid.
        It gets all the charges per month to show in the billings/index view
         */
        public function index(){
            /* Formats the date to from complete (2011-01-30) to year month only (201101) */
            $start_date = substr(str_replace("-" , "" , $this->input->post("start_date" , TRUE)), 0, 6);

            $end_date = substr(str_replace("-" , "" , $this->input->post("end_date" , TRUE)), 0, 6);

            /* set default date range to Jan 2011 - Dec 2011 if no date inputs entered*/
            if(empty($start_date)){
                $start_date = 201101;
            }

            if(empty($end_date)){
                $end_date = 201112;
            }

            /* Redirects to /billings/error if start date is greater than end date */
            if(str_replace("-" , "" , $this->input->post("start_date" , TRUE)) > str_replace("-" , "" , $this->input->post("end_date" , TRUE))){
                redirect("/billings/error");
            }

            /* Gets the charges per month and put in a variable for billings/index view.
            Set row for table color indexing*/
            $data = array(
                "billings" => $this->Billing->get_billings($start_date , $end_date),
                "row" => -1
            );

            $this->load->view("billings/index" , $data);
        }

        /* Shows error message if start date is greater than end date */
        public function error(){
            echo "start date cannot be greater than end date";
        }
    }
?>
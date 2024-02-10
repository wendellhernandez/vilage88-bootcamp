<?php
    class Student extends DataMapper{
        var $has_one = array("course");

        var $validation = array(
            "last_name" => array(
                "label" => "Last Name",
                "rules" => array("required" , "alpha" , "min_length[2]")
            ),
            "first_name" => array(
                "label" => "First Name",
                "rules" => array("required" , "alpha" , "min_length[2]")
            ),
            "gender" => array(
                "label" => "Gender",
                "rules" => array("required")
            )
        );
    }
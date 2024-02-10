<?php
    class Student extends DataMapper{
        var $validation = array(
            "last_name" => array(
                "label" => "Last Name",
                "rules" => array("required" , "alpha")
            ),
            "first_name" => array(
                "label" => "First Name",
                "rules" => array("required" , "alpha")
            ),
            "gender" => array(
                "label" => "Gender",
                "rules" => array("required")
            )
        );
    }
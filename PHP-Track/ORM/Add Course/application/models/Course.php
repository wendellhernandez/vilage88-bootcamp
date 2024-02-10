<?php
    class Course extends DataMapper{
        var $has_many = array("student");
    }
<?php
    class Sites extends QueryBuilder
    {
        public $count;

        public function __construct(){
            parent::__construct();
            $this->table_name = 'sites';
            $this->count = "COUNT(*)";
        }
    }
?>
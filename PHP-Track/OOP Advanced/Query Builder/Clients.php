<?php
    class Clients extends QueryBuilder
    {
        public function __construct(){
            parent::__construct();
            $this->table_name = 'clients';
            $this->sql = "SELECT * FROM clients";

            $sql = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = N'clients'";

            $this->table_head = parent::fetch_all($sql);
        }
    }
?>
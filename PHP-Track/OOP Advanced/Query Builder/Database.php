<?php
    class Database
    {
        private $connection;
        private $host;
        private $user;
        private $pass;
        private $db_name;

        protected function __construct()
        {
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db_name = "lead_gen_business";

            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        }

        protected function fetch_all($query)
        {
            $data = array();
            $result = $this->connection->query($query);

            while($row = mysqli_fetch_assoc($result)) 
            {
                $data[] = $row;
            }

            return $data;
        }

        protected function fetch_record($query)
        {
            $result = $this->connection->query($query);
            return mysqli_fetch_assoc($result);
        }

        protected function run_mysql_query($query)
        {
            $this->connection->query($query);
            return $this->connection->insert_id;
        }

        protected function escape_this_string($string)
        {
            return $this->connection->real_escape_string($string);
        }
    }
?>
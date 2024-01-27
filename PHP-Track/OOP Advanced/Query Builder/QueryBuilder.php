<?php
    class QueryBuilder extends Database
    {
        protected $table_name;
        protected $sql;
        protected $table_head = array();

        public function __construct(){
            parent::__construct();
            $this->sql = "SELECT * FROM table_name";
        }

        public function select($columns){
            $this->table_head[] = $columns;
            $column = implode("," , $columns);

            $this->sql = "SELECT $column FROM $this->table_name";

            return $this;
        }

        public function where($conditions){
            $condition= "";

            foreach($conditions as $key => $value){
                $condition .= "$key = '$value' AND ";
            }

            $condition = rtrim($condition, "AND ");
            $this->sql .= " WHERE $condition";

            return $this;
        }

        public function group_by($column){
            $this->sql .= " GROUP BY $column";

            return $this;
        }

        public function having($aggregate, $comparison, $value){
            $this->sql .= " HAVING $aggregate $comparison $value";

            return $this;
        }

        public function get(){
            $result = parent::fetch_all($this->sql);
?>
<table>
    <tr>
<?php
            foreach($this->table_head as $row){
                foreach($row as $key => $value){
?>
        <th><?= $value ?></th>
<?php
                }
            }
?>
    </tr>
<?php
            foreach($result as $row){
?>
    <tr>
<?php
                foreach($row as $column){
?>
        <td><?= $column ?></td>
<?php
                }
?>
    </tr>
<?php
            }
?>
</table>
<br>
<br>
<?php
        }
    }
?>
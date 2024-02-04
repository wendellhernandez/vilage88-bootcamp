<?php
    class Player extends CI_Model{
        /* Get all players from database that is filtered using user inputs like name , gender and sports. */
        public function get_players(){
            /* Name filter from user input */
            $name_filter = $this->input->get("name_filter" , TRUE);

            /* Sets genders to male and female if there is no user input */
            $gender = $this->input->get("gender" , TRUE);
            if(!empty($gender)){
                $genders = implode("','" , $gender);
            }else{
                $genders = "male' , 'female";
            }

            /* Sets sport filter to empty string if there is no user input */
            $sports = $this->input->get("sports" , TRUE);
            if(!empty($sports)){
                $sports = implode("%' OR sport_name LIKE '%" , $sports);
            }else{
                $sports = "";
            }
            
            /* SQL Query for filtering players.
            This has the name filter, gender filter and sport filter */
            $sql = "SELECT players.name AS player_name , players.image AS image , group_concat(sports.name) AS sport_name 
            FROM player_sports
            LEFT JOIN players ON player_sports.player_id = players.id
            LEFT JOIN sports ON player_sports.sport_id = sports.id
            WHERE players.name LIKE '%$name_filter%' 
            AND players.gender IN ('$genders') 
            GROUP BY player_name
            HAVING (sport_name LIKE '%$sports%')
            ";

            /* Returns all the filters players to the Players controller */
            return $this->db->query($sql)->result_array();
        }
    }
?>
const CI_Model = require('./CI_Model');
const bcryptjs = require('bcryptjs');

class Player extends CI_Model{
    /* 
        Get all players.
    */
    get_players(){
        let query = 'SELECT * , players.name AS player_name FROM players;';

        return this.get_results(query);
    }
    /*
        Get all sports.
    */    
    get_sports(){
        let query = 'SELECT * FROM sports;';

        return this.get_results(query);
    }
    /* 
        Get all players from database that is filtered using user inputs like name , gender and sports. 
    */
    get_filtered_players(name_filter , gender , sport_filter){
        /* 
            Sets genders to male and female if there is no user input 
        */
        let genders = "male' , 'female";

        if(gender && gender.length == 1){
            genders = gender[0];
        }
        /* 
            Sets sport filter to empty string if there is no user input 
        */
        let sports;
        if(sport_filter != undefined){
            if(sport_filter.length == 1){
                sports = sport_filter[0];
            }else{
                let more_sports = '';
                for(let i=1; i<sport_filter.length; i++){
                    more_sports += "%' OR sport_name LIKE '%" + sport_filter[i];
                }
                sports = sport_filter[0] + more_sports;
            }
        }else{
            sports = "";
        }

        /* 
            SQL Query for filtering players.
            This combines the name filter, gender filter and sport filter 
        */
        let query = `SELECT players.name AS player_name , players.image AS image , group_concat(sports.name) AS sport_name 
                    FROM player_sports
                    LEFT JOIN players ON player_sports.player_id = players.id
                    LEFT JOIN sports ON player_sports.sport_id = sports.id
                    WHERE players.name LIKE '%${name_filter}%' 
                    AND players.gender IN ('${genders}') 
                    GROUP BY player_name
                    HAVING (sport_name LIKE '%${sports}%')
        `;
        /* 
            Returns all the filtered players to the Players controller 
        */
        return this.get_results(query);
    }
}

module.exports = new Player();
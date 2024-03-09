const PlayerModels = require(`../models/Player`);
const bcryptjs = require('bcryptjs');

class Players{
    /*
        Shows all the players in the home page when not filtered
    */
    async index(req , res){
        const players = await PlayerModels.get_players();
        const sports = await PlayerModels.get_sports();

        res.render("index" , {players , sports});
    }
    /*
        Shows only the filtered players
    */
    async filter(req , res){
        const {name_filter , gender} = req.body;
        const sport_filter = req.body.sports;
        const players = await PlayerModels.get_filtered_players(name_filter , gender , sport_filter);
        const sports = await PlayerModels.get_sports();

        res.render("players_partial" , {players , sports});
    }
}

module.exports = new Players();
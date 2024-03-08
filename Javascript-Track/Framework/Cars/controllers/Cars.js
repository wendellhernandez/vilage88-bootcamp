const CarModels = require(`../models/Car`);

class Cars{
    index(req , res){
        if(req.session.visits == undefined){
            req.session.visits = 1;
        }else{
            req.session.visits++;
        }

        let visits = req.session.visits;

        async function get_cars_async(){
            const cars = await CarModels.get_cars();
            
            res.render("index" , {cars , visits});
        }

        get_cars_async();
    }

    reset(req , res){
        req.session.visits = 0;

        res.redirect('/');
    }
}

module.exports = new Cars();
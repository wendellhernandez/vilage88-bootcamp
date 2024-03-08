const FeedbackModels = require(`../models/Feedback`);

class Feedbacks{
    index(req , res){
        res.render('index');
    }

    result(req, res) {
        FeedbackModels.set_feedback();

        let data = {
            'name' : req.body.name,
            'course' : req.body.course,
            'score' : req.body.score,
            'reason' : req.body.reason
        }
    
        res.render("result" , data);
    }
}

module.exports = new Feedbacks();
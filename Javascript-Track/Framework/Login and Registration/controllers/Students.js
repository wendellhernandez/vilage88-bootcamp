const StudentModels = require(`../models/Student`);

class Students{
    index(req , res){
        res.render("index");
    }

    profile(req , res){
        async function get_students_async(){
            const students = await StudentModels.get_students();
            
            res.render("index" , {students , visits});
        }

        get_students_async();
    }

    login(req , res){
        res.render("index");
    }

    register(req , res){
        async function set_students_async(){
            const {first_name , last_name , email_address , password , confirm_password} = req.body;

            const students =  await StudentModels.set_students(first_name , last_name , email_address , password , confirm_password);

            console.log(students);
        }

        set_students_async();
    }
}

module.exports = new Students();
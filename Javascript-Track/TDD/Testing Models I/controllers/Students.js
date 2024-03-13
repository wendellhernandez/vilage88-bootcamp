const StudentModels = require(`../models/Student`);
const bcryptjs = require('bcryptjs');

class Students{
    index(req , res){
        if(req.session.email_address){
            res.redirect('/students/profile');
        }else{
            let register_error , login_error;
            res.render("index" , {register_error , login_error});
        }
    }

    async profile(req , res){
        if(!req.session.email_address){
            res.redirect('/');
        }else{
            const students = await StudentModels.get_student_by_email(req.session.email_address);

            res.render("profile" , {students});
        }
    }

    async login(req , res){
        const {email_address , password} = req.body;
        let register_error , login_error;
        let student = await StudentModels.get_student_by_email(email_address);
        
        if(!student){
            login_error = 'Invalid Credentials';

            res.render("index" , {register_error , login_error});
        }else if(!bcryptjs.compareSync(password , student.password)){
            login_error = 'Invalid Credentials';

            res.render("index" , {register_error , login_error});
        }else{
            req.session.email_address = email_address;

            res.redirect('/students/profile');
        }
    }

    async register(req , res){
        const {first_name , last_name , email_address , password , confirm_password} = req.body;
        let register_error , login_error;
        let regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        let student = await StudentModels.get_student_by_email(email_address);

        if(first_name === '' || last_name === '' || email_address === '' || password === '' || confirm_password === ''){
            register_error = 'Fields cannot be empty';

            res.render("index" , {register_error , login_error});
        }else if(!regEx.test(email_address)){
            register_error = 'Invalid Email';

            res.render("index" , {register_error , login_error});
        }else if(password !== confirm_password){
            register_error = 'Password does not match';

            res.render("index" , {register_error , login_error});
        }else if(student){
            register_error = 'Email already registered';

            res.render("index" , {register_error , login_error});
        }else{
            await StudentModels.set_student(first_name , last_name , email_address , password , confirm_password);

            req.session.email_address = email_address;

            res.redirect('/students/profile');
        }
    }

    logoff(req , res){
        req.session.email_address = '';

        res.redirect('/');
    }
}

module.exports = new Students();
const CI_Model = require('./CI_Model');
const bcryptjs = require('bcryptjs');

class Student extends CI_Model{
    get_students(){
        let query = 'SELECT * FROM students;';

        return this.get_results(query);
    }

    get_student_by_email(email_address){
        let query = `SELECT * FROM students
            WHERE email_address = ?
        ;`;

        let data = [email_address];

        return this.get_row(query , data);
    }

    async set_student(first_name , last_name , email_address , password , confirm_password){
        let query = `INSERT INTO 
            students(first_name , last_name , email_address , password)
            values(? , ? , ? , ?);`;

        let hashed = await bcryptjs.hashSync(password , 8);

        let data = [first_name , last_name , email_address , hashed];

        return this.query(query , data);
    }
}

module.exports = new Student();
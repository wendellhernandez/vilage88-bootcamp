const CI_Model = require('./CI_Model');

class Student extends CI_Model{
    get_students() {
        let query = 'SELECT * FROM students';

        return this.query(query);
    }

    set_students(first_name , last_name , email_address , password , confirm_password) {
        let query = `INSERT INTO 
            students(first_name , last_name , email_address , password , confirm_password)
            values('${first_name}' , '${last_name}' , '${email_address}' , '${password}' , '${confirm_password}');`;

        return this.query(query);
    }
}

module.exports = new Student();
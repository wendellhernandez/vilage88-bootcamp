const StudentModels = require('../models/Student');
const {expect} = require('chai');

describe('Student Model' , function(){
    it('get_students function should select all students from the database' , async function(){
        let result = false;

        let students = await StudentModels.get_students('SELECT * FROM students;');

        if(students && students != 'error'){
            result = true;
        }

        expect(result).to.equal(true);
    })

    it('get_students function should return "error" if there is an exception error' , async function(){
        let students = await StudentModels.get_students('SELECT * FROM studen;');

        if(students == 'error'){
            result = 'error';
        }else{
            result = true;
        }

        expect(result).to.equal('error');
    })

    it('get_students function should return "empty parameter" if other required params are missing.' , async function(){
        let students = await StudentModels.get_students();

        if(students == 'empty parameter'){
            result = 'empty parameter';
        }else{
            result = true;
        }

        expect(result).to.equal('empty parameter');
    })

    it('get_student_by_email function should select all students from the database' , async function(){
        let result = false;

        let students = await StudentModels.get_student_by_email('wen@gmail.com');

        if(students && students != 'error'){
            result = true;
        }

        expect(result).to.equal(true);
    })

    it('get_student_by_email function should return "error" if there is an exception error' , async function(){
        let students = await StudentModels.get_student_by_email('weasdasd@gmail.com' , 'asdf');

        if(students == 'error'){
            result = 'error';
        }else{
            result = true;
        }

        expect(result).to.equal('error');
    })

    it('get_student_by_email function should return "empty parameter" if other required params are missing.' , async function(){
        let students = await StudentModels.get_student_by_email();

        if(students == 'empty parameter'){
            result = 'empty parameter';
        }else{
            result = true;
        }

        expect(result).to.equal('empty parameter');
    })
})
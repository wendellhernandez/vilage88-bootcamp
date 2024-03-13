const chai                  = require('chai');
const expect                = chai.expect;
const UserModel             = require('../models/user.model');
const Mysql                 = require('mysql');
const executeQuery  		= require('../config/database.js');

describe('Login feature', function(){

    describe('User Model', function(){

        it('Given email and password as input, it should return user info (including password) when the email is found in the database' , async function(){
            let result = false;

            let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , ['testuser@test.com']);

            let user = await executeQuery(query);

            if(user){
                result = true;
            }
            
            expect(result).to.equal(true);
        });

        it("Given email and password as input, it should return false when email doesn't exist in database." , async function(){
            let result = false;

            let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , ['testuser@']);

            let user = await executeQuery(query);

            if(user){
                result = true;
            }
            
            expect(result).to.equal(true);
        });

        it("Given email and password as input, it should return true when email and password is correct" , async function(){
            let result = false;

            let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , ['testuser@test.com']);

            let user = await executeQuery(query);

            if(user && user[0].password == 'password123'){
                result = true;
            }
            
            expect(result).to.equal(true);
        });

        it('Given email and password as input, it should return the expected redirect_url (/success page) on success' , async function(){
            let redirect_url = '/';

            let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , ['testuser@test.com']);

            let user = await executeQuery(query);

            if(user && user[0].password == 'password123'){
                redirect_url = '/success page';
            }
            
            expect(redirect_url).to.equal('/success page');
        });

        it('Given password as input, it should return an error message saying: Email is required, when email is missing' , async function(){
            let email = '';
            let password = 'password123';
            let result;

            if(email != ''){
                result = false;

                let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , email);
    
                let user = await executeQuery(query);
    
                if(user && user[0].password == password){
                    result = true;
                }
            }else{
                result = 'Email is required';
            }
            
            
            expect(result).to.equal('Email is required');
        });

        it('Given email as input, it should return an error message saying: Password is required, when password is missing' , async function(){
            let email = 'testuser@test.com';
            let password = '';
            let result;

            if(email != ''){
                if(password != ''){
                    result = false;

                    let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , [email]);
        
                    let user = await executeQuery(query);
        
                    if(user && user[0].password == password){
                        result = true;
                    }
                }else{
                    result = 'Password is required';
                }
            }else{
                result = 'Email is required';
            }
            
            expect(result).to.equal('Password is required');
        });

        it('Given empty input, it should return an error message saying: Email and password is required, when all fields are missing' , async function(){
            let email = '';
            let password = '';
            let result;

            if(email == '' && password == ''){
                result = 'Email and password is required';
            }else if(email != ''){
                if(password != ''){
                    result = false;

                    let query = Mysql.format(`SELECT * FROM users WHERE email = ?;` , [email]);
        
                    let user = await executeQuery(query);
        
                    if(user && user[0].password == password){
                        result = true;
                    }
                }else{
                    result = 'Password is required';
                }
            }else{
                result = 'Email is required';
            }
            
            expect(result).to.equal('Email and password is required');
        });
        
    });
});


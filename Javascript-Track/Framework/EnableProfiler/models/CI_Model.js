const {dbhost , dbname , dbpass , dbdatabase} = require('../config');
const mysql = require('mysql');
const connection = mysql.createConnection({
    host: dbhost,
    user: dbname,
    password: dbpass,
    database: dbdatabase
})

class CI_Model{
    query(query , data) {
        return new Promise(function(resolve , reject){
            connection.query(query, data , function (err, result) {
                if(err){
                    resolve(err);
                }else{
                    resolve('query success');
                }
            });	
        })
    }

    get_row(query, data) {
        return new Promise(function(resolve , reject){
            connection.query(query, data , function (err, result) {
                if(err){
                    resolve(err);
                }else{
                    resolve(result[0]);
                }
            });	
        })
    }

    get_results(query, data) {
        return new Promise(function(resolve , reject){
            connection.query(query, data , function (err, result) {
                if(err){
                    resolve(err);
                }else{
                    resolve(result);
                }
            });	
        })
    }
}

module.exports = CI_Model;
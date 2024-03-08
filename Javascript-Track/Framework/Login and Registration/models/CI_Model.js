const {dbhost , dbname , dbpass , dbdatabase} = require('../config');
const mysql = require('mysql');
const connection = mysql.createConnection({
    host: dbhost,
    user: dbname,
    password: dbpass,
    database: dbdatabase
})

class CI_Model{
    query(query) {
        return new Promise(function(resolve , reject){
            connection.query(query, function (err, result) {
                resolve(result);
            });	
        })
    }

    get_row(query) {
        return new Promise(function(resolve , reject){
            connection.query(query, function (err, result) {
                resolve(result[0]);
            });	
        })
    }
}

module.exports = CI_Model;
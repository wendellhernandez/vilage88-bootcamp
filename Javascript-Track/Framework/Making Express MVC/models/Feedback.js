const {dbhost , dbname , dbpass , dbdatabase} = require('../config');

class Feedback{
    set_feedback(){
        console.log('Feedback set');
    }
}

module.exports = new Feedback();
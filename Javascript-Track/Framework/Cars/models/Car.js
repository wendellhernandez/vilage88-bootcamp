const CI_Model = require('./CI_Model');

class Car extends CI_Model{
    get_cars() {
        let query = 'SELECT * FROM cars';

        return this.query(query);
    }
}

module.exports = new Car();
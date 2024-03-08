const routes = require('./routes');
const {port} = require('./config');

routes.listen(port , function(){
    console.log('Listening from port: ' + port);
});
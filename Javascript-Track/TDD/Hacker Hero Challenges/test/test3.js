const {expect} = require('chai');
/*
    Test 3
*/
describe('Fahrenheit to Celcius' , function(){
    it('should accepts a number of degrees in Celcius, and returns the equivalent temperature as expressed in Fahrenheit degrees' , function(){
        function celciusToFahrenheit(cDegrees){
            return (((9/5)*cDegrees) + 32);
        }

        expect(celciusToFahrenheit(5)).to.equal(41);
    })
})
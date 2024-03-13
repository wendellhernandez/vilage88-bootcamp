const {expect} = require('chai');
/*
    Test 1
*/
describe('Return Sum' , function(){
    it('should returns the sum of the two numbers passed as its arguments' , function(){
        function add(a , b){
            return a + b;
        }

        expect(add(2,2)).to.equal(4);
    })
})
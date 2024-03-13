const {expect} = require('chai');
/*
    Test 8
*/
describe('Sigma' , function(){
    it('should return the sum of all positive integers up to a number (inclusive).' , function(){
        function sigma(num){
            let sum = 0;

            for(let i=num; i>0; i--){
                sum += i;    
            }

            return sum;
        }

        expect(sigma(3)).to.equal(6);
    })
})
const {expect} = require('chai');
/*
    Test 9
*/
describe('Factorial' , function(){
    it('should return the product (multiplication) of all positive integers from 1 up to number (inclusive).' , function(){
        function factorial(num){
            let product = 1;

            for(let i=1; i<=num; i++){
                product *= i;    
            }

            return product;
        }

        expect(factorial(3)).to.equal(6);
    })
})
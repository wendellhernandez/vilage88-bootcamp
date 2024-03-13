const {expect} = require('chai');
/*
    Test 10
*/
describe('Threes and Fives' , function(){
    it('should add values from 1 and n (inclusive) if that value is not divisible by 3 or 5. Return the final sum.' , function(){
        function threesFives(num){
            let sum =0;

            for(let i=1; i<=num; i++){
                if(i%3===0 || i%5===0){
                }else{
                    sum += i;
                }    
            }

            return sum;
        }

        expect(threesFives(10)).to.equal(22);
    })
})
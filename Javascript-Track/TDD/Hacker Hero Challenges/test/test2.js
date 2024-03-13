const {expect} = require('chai');
/*
    Test 2
*/
describe('Countdown by 8' , function(){
    it('should log positive numbers starting at 2019, counting down by 8.' , function(){
        function CountDownBy8(){
            let arr = [];

            for(let i=2019; i>0; i-=8){
                arr.push(i);
            }

            return arr.length;
        }

        expect(CountDownBy8()).to.equal(Math.ceil(2019/8));
    })
})
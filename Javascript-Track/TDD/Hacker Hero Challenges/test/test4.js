const {expect} = require('chai');
/*
    Test 4
*/
describe('Biggie Size' , function(){
    it('should changes all positive numbers in the array to “big”.' , function(){
        function makeItBig(arr){
            for(let i=0; i<arr.length; i++){
                if(arr[i] > 0){
                    arr[i] = 'big';
                }
            }
            
            return arr;
        }

        expect(makeItBig([-4,0,4])[2]).to.equal("big");
    })
})
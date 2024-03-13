const {expect} = require('chai');
/*
    Test 6
*/
describe('Double Vision' , function(){
    it('should return a new array where each value in the original has been doubled.' , function(){
        function double(arr){
            for(let i=0; i<arr.length; i++){
                arr[i] = arr[i]*2;   
            }
            
            return arr;
        }

        expect(double([1,2,3])[0]).to.equal(2);
    })
})
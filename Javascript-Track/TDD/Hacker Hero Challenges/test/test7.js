const {expect} = require('chai');
/*
    Test 7
*/
describe('Return Array Count Greater than Y' , function(){
    it('should return the number of array values greater than Y.' , function(){
        function returnArrayCountGreaterThanY(arr, y){
            let count = 0;

            for(let i=0; i<arr.length; i++){
                if(arr[i] > y){
                    count++;    
                }    
            }

            return count;
        }

        expect(returnArrayCountGreaterThanY( [2,3,5], 1)).to.equal(3);
    })
})
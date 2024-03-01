module.exports = function (){
    return {
        concat: function(word1, word2) { 
            return word1 + word2;
        },
        repeat: function(word, times) {
            let newWord = '';
            for(let i=0; i<times; i++){
                newWord += word;
            }
            return newWord;
        },
        toString: function(input) {
            return `${input}`;
        },
        charAt: function(word, index) {
            return word[index];
        }
    }
};
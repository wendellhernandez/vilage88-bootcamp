class StringLib{
    concat(word1, word2) { 
        return word1 + word2;
    }

    repeat(word, times) {
        let newWord = '';
        for(let i=0; i<times; i++){
            newWord += word;
        }
        return newWord;
    }

    toString(input) {
        return `${input}`;
    }

    charAt(word, index) {
        return word[index];
    }
}

module.exports = new StringLib()
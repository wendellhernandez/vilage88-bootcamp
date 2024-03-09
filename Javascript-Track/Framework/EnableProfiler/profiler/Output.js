class Output{
    enable_profiler(req , res){
        console.log(req.session);
        console.log(req.body);

        res.send('asdf');
    }
}

module.exports = new Output;
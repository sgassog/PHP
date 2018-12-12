var express = require('express');

var app = express();
app.get('/',(req, res) => {
    res.send("Welcome!");
});

var server = app.listen(3000,() => {
    console.log('Server is running!');
});

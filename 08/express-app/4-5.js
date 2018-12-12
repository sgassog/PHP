var express = require('express');
var ejs = require("ejs");

var app = express();

app.engine('ejs',ejs.renderFile);

app.get('/',(req, res) => {
    res.render('4-4.ejs',
  {
    title:'Index',
    content:'This is Express-app Top page!'
  });
});

var server = app.listen(3000,() => {
    console.log('Server is running!');
});

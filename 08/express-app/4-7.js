var express = require('express');
var ejs = require("ejs");

var app = express();

app.engine('ejs',ejs.renderFile);

app.use(express.static('public'));

app.get('/',(req, res) => {
    var msg = 'This is Index Page!<br>'
        + 'これはスタイルシートを適用した例です';
    res.render('4-4.ejs',
        {
            title: 'Index',
            content: msg
        });
});

var server = app.listen(3000,() => {
    console.log('Server is running!');
});

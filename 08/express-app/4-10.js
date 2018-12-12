var express = require('express');
var ejs = require("ejs");

var app = express();

app.engine('ejs',ejs.renderFile);

app.use(express.static('public'));

app.get('/',(req, res) => {
    var msg = 'This is Index Page!<br>'
        + 'これはトップページです';
    res.render('4-8.ejs',
        {
            title: 'Index',
            content: msg,
            link:{href:'/other?name=taro&pass=yamada',text:'※別ページに移動'}
        });
});


app.get('/other',(req, res) => {
    var name = req.query.name;
    var pass = req.query.pass;
    var msg = 'あなたの名前は「'+name+ '」<br>パスワードは「'+pass+'」です。';
    res.render('4-8.ejs',
        {
            title: 'other',
            content: msg,
            link:{href:'/',text:'※トップに戻る'}
        });
});

var server = app.listen(3000,() => {
    console.log('Server is running!');
});

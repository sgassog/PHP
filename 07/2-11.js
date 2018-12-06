const http = require('http');
const fs = require('fs');
const ejs = require('ejs');

const index_page = fs.readFileSync('./2-10.ejs','UTF-8');

var server = http.createServer(getFormClient);

server.listen(3000);
console.log('Server start!');

// ここまでメインプログラム------------------

// createServerの処理---------------------

function getFormClient(request,response) {
    var content = ejs.render(index_page);
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
}

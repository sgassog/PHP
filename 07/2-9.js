const http = require('http');
const fs = require('fs');

var server = http.createServer(getFormClient);

server.listen(3000);
console.log('Server start!');

// ここまでメインプログラム------------------

// createServerの処理---------------------

function getFormClient(request,response) {
  fs.readFile('./2-8.html','UTF-8',
  (error,data)=>{
    var content = data.
    replace(/dummy_title/g,'タイトルです').
    replace(/dummy_content/g,'これがコンテンツです');
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
  }
);
}

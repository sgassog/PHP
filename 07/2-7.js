const http = require('http');
const fs = require('fs');

var request;
var response;

var server = http.createServer(getFormClient);

server.listen(3000);
console.log('Server start!');

// ここまでメインプログラム------------------

// createServerの処理---------------------

function getFormClient(req,res) {
  request = req;
  response = res;
  fs.readFile('./2-4.html','UTF-8',writeToResponse);
}

function writeToResponse(error,data) {
  response.writeHead(200,{'Content-Type':'text/html'});
  response.write(data);
  response.end();
}

const http = require('http');

var server = http.createServer(
  (request,response)=>{
    response.setHeader('Content-Type','text/html');
    response.write('<head><meta charset="utf-8">');
    response.write('<title>Hello</title></head>');
    response.write('<p>This is Node.js sample page.</p>');
    response.write('<p>これはNode.jsのサンプルページです</p>','utf8');
    response.write('</body></html>');
    response.end();
  }
);

server.listen(3000);

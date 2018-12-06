const http = require('http');
const fs = require('fs');
const ejs = require('ejs');
const url = require('url');

const index_page = fs.readFileSync('./2-15.ejs','UTF-8');
const style_css = fs.readFileSync('./2-14.css','UTF-8');

var server = http.createServer(getFormClient);

server.listen(3000);
console.log('Server start!');

// ここまでメインプログラム------------------

// createServerの処理---------------------

function getFormClient(request,response) {
  var url_parts = url.parse(request.url);
  switch (url_parts.pathname) {
    case '/':
    var content = ejs.render(index_page,{
      title:"Index",
      content:"これはテンプレートを使ったサンプルページです"
    });
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
    break;

    case '/2-14.css':
    response.writeHead(200,{'Content-Type':'text/css'});
    response.write(style_css);
    response.end();
    break;
    default:
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
    break;
  }


}

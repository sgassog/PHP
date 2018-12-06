const http = require('http');
const fs = require('fs');
const ejs = require('ejs');
const url = require('url');

const index_page = fs.readFileSync('./2-18.ejs','UTF-8');
const other_page = fs.readFileSync('./2-17.ejs','UTF-8');
const style_css = fs.readFileSync('./2-14.css','UTF-8');

var server = http.createServer(getFormClient);

server.listen(3000);
console.log('Server start!');

// ここまでメインプログラム------------------

// createServerの処理---------------------

function getFormClient(request,response) {
  var url_parts = url.parse(request.url,true);
  switch (url_parts.pathname) {
    case '/':
    var content = "これはIndexページです。";
    var query = url_parts.query;
    if (query.msg!=undefined) {
      var query_obj=
      content+='あなたは、「'+query.msg+'」と送りました。'
    }
    var content = ejs.render(other_page,{
      title:"Index",
      content:content
    });
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
    break;

    case '/other':
    var content = ejs.render(other_page,{
      title:"Other",
      content:"これは新しく用意したページです"
    });
    response.writeHead(200,{'Content-Type':'text/html'});
    response.write(content);
    response.end();
    break;

    case '/2-14.css':
    response.writeHead(200,{'Content-Type':'text/css'});
    response.write(style_css);
    response.end();
    break

    default:
    response.writeHead(200,{'Content-Type':'text/plain'});
    response.end('no page');
    break;
  }


}

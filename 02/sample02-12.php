<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <?php

     $banner[1][0] = "http://www.gihyo.co.jp/indexJ.html";
     $banner[1][1] = "gihyo.gif";
     $banner[2][0] = "http://www.apache.org/";
     $banner[2][1] = "asf_logo_wide.gif";
     $banner[3][0] = "http://www.php.ne./";
     $banner[3][1] = "php.gif";
     $banner[4][0] = "http://www.mysql.com/";
     $banner[4][1] = "mysql_100x52-64.gif";

     srand(microtime()*1000000);

     $data = rand(1,4);

     $html = "<a href='".$banner[$data][0]."'>"."<img src='images/".$banner[$data][1]."'></a>";

     print $html;

      ?>
  </body>
</html>

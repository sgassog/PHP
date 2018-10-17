<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    for ($cnt=0; $cnt <=10 ; $cnt++) {
      print $cnt;
      if ($cnt<=5) {
        print "●";
      }else {
        exit();
      }
      print "<br>";
    }
    print "ループ終了！";
     ?>
  </body>
</html>

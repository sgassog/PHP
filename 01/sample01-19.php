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

      print ($cnt<=5) ? "●":"▼";
      print "<br>";
    }
     ?>
  </body>
</html>

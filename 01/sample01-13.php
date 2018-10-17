<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    for ($cnt=1; $cnt < 10; $cnt++) {
      print $cnt;
      print ",";
    }
    print "<br>";
    for ($cnt=10; $cnt >= 1; $cnt = $cnt - 2) {
      print $cnt;
      print ",";
    }
     ?>
  </body>
</html>

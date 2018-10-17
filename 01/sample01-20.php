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

      if ($cnt==5) {
        print "●";
      }
      if ($cnt>5) {
        print "▼";
      }
      if ($cnt>=5) {
        print "▽";
      }
      if ($cnt<3) {
        print "■";
      }
      if ($cnt<=3) {
        print "□";
      }
      if ($cnt<>7) {
        print "★";
      }
      print "<br>";
    }
     ?>
  </body>
</html>

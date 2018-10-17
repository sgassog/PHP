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

      switch ($cnt) {
        case 1:
        print "★";
        break;
        case 2:
        print "⭐︎";
        break;
        case 3:
        print "●";
        break;
        case 4:
        print "○";
        break;

        default:
        print "×";
        break;
      }
      print "<br>";
    }
     ?>
  </body>
</html>

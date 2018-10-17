<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $data = 0;
    for ($i=1; $i <10 ; $i++) {
      print ++$data;
      print ",";
    }
    print "<br>";

    $data = 0;
    for ($i=1; $i <10 ; $i++) {
      print $data++;
      print ",";
    }
    print "<br>";

    $data = 10;
    for ($i=1; $i <10 ; $i++) {
      print $data--;
      print ",";
    }
    print "<br>";


     ?>
  </body>
</html>

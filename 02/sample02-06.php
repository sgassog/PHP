<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $data = 1254.56789;

    print round($data);
    print "<br>";

    print round($data*100)/100;
    print "<br>";

    print round($data*10000)/10000;
    print "<br>";

    print round($data/100)*100;
    print "<br>";
     ?>
  </body>
</html>

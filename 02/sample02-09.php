<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    srand(microtime()*1000000);

    for ($i=1; $i <=5 ; $i++) {
      print rand(1,6);
      print "<br>";
    }
     ?>
  </body>
</html>
